<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:slider-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:slider-edit', ['only' => ['edit', 'update', 'updateProdColorQty']]);
        // $this->middleware('permission:slider-delete', ['only' => ['destroy', 'deleteImage', 'deleteProdColorQty']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::latest()->paginate(5);
        return view('admin.coupons.index', compact('coupons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $coupon = Coupon::latest()->paginate(5);
        return view('admin.coupons.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'coupon_code' => 'required',
            'coupon_name' => 'required',
            'coupon_type' => 'required',
            'amount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);

        $coupon = Coupon::create([
            'coupon_code' => $request->input('coupon_code'),
            'coupon_name' => $request->input('coupon_name'),
            'coupon_type' => $request->input('coupon_type'),
            'amount' => $request->input('amount'),
            'start_date' => Carbon::parse($request->input('start_date'))->format('Y-m-d'),
            'end_date' => Carbon::parse($request->input('end_date'))->format('Y-m-d'),
            'start' => $request->input('status') == true ? '1' : '0',
        ]);

        return redirect()->route('admin.coupons.index')
            ->with('success', 'Coupon created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate([
            'coupon_code' => 'required',
            'coupon_name' => 'required',
            'coupon_type' => 'required',
            'amount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);


        $coupon = Coupon::findOrFail($id);

        if ($coupon) {
            $coupon->coupon_code = $request->input('coupon_code');
            $coupon->coupon_name = $request->input('coupon_name');
            $coupon->coupon_type = $request->input('coupon_type');
            $coupon->amount = $request->input('amount');
            $coupon->start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
            $coupon->end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');
            $coupon->status = $request->input('status') == true ? '1' : '0';
            $coupon->update();

            return redirect()->route('admin.coupons.index')->with('success', 'Coupon updated successfully.');
        } else {
            return redirect()->route('admin.coupons.index')->with('error', 'No Such Slider Id Found.');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('admin.coupons.index')
            ->with('success', 'Coupon deleted successfully');
    }
}
