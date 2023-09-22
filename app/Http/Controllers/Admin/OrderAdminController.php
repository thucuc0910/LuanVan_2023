<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        // dd($todayDate);
        $orders = Order::when($request->date != null, function ($q) use ($request) {
            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate) {
            return $q->whereDate('created_at', $todayDate);
        })
            ->when($request->status != null, function ($q) use ($request) {
                return $q->where('status_message', $request->status);
            })
            ->paginate(10);
        // $orders = Order::all();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }
    public function show($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            return view('admin.orders.show', compact('order'));
        } else {
            return redirect('admin.orders')->with('message', 'Không tìm thấy đơn hàng!!');
        }
    }

    public function update($orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {

            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orderId)->with('success', 'Đơn hàng đã được cập nhật thành công.');
        } else {
            return redirect('admin/orders')->with('message', 'Không tìm thấy đơn hàng!!');
        }
    }

    // Xem trc file PDF
    public function viewPDF($orderId)
    {
        $order = Order::findOrFail($orderId);
        $orderItems = OrderItem::findOrFail($orderId);
        return view('admin.orders.viewInvoice', compact('order', 'orderItems'));
    }

    public function PDF($orderId)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $order = Order::findOrFail($orderId);
        $orderItems = OrderItem::findOrFail($orderId);
        $data = [
            'order' => $order,
            'orderItems' => $orderItems,
        ];
        $pdf = Pdf::loadView('admin.orders.viewInvoice', $data);
        return $pdf->download('invoice'.$order->id.'-'.$todayDate.'.pdf');
    }
}
