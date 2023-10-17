<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductWareHouse;
use App\Models\Provider;
use App\Models\Size;
use App\Models\WareHouse;
use App\Models\WareHouseTemp;
use Illuminate\Http\Request;

class WareHouseController extends Controller
{
    public function index(Request $request)
    {
        $wareHouses = WareHouse::paginate(5);
        return view('admin.warehouse.index', [
            'wareHouses' => $wareHouses,
        ]);
    }

    public function create()
    {
        $products = Product::where('status', 1)->paginate(5);
        $sizes = Size::where('status', 1)->get();
        $providers = Provider::where('status', 1)->get();
        $warehouseTemps = WareHouseTemp::where('user_id', auth()->user()->id)->get();
        return view('admin.warehouse.create', [
            'products' => $products,
            'sizes' => $sizes,
            'providers' => $providers,
            'warehouseTemps' => $warehouseTemps,
        ]);
    }

    public function store(Request $request)
    {

        $wareHouse = new WareHouse();
        $wareHouse->admin_id = auth()->user()->id;
        $wareHouse->provider_id = $request->input('provider');
        $wareHouse->note = $request->input('note');
        $wareHouse->status = 0;
        $wareHouse->save();

        $wareHouseTemps = WareHouseTemp::where('user_id', auth()->user()->id)->get();

        foreach ($wareHouseTemps as $key => $wareHouseTemp) {
            $wareProductHouse = new ProductWareHouse();
            $wareProductHouse->ware_house_id = $wareHouse->id;
            $wareProductHouse->product_id = $wareHouseTemp->product_id;
            $wareProductHouse->size_id = $wareHouseTemp->size_id;
            $wareProductHouse->quantity = $wareHouseTemp->quantity;
            $wareProductHouse->price_import = $wareHouseTemp->price_import;
            $wareProductHouse->save();

            $producSize = ProductSize::where('product_id', $wareHouseTemp->product_id)->where('size_id', $wareHouseTemp->size_id)->first();
            if ($producSize) {
                $producSize->product_id = $wareHouseTemp->product_id;
                $producSize->size_id = $wareHouseTemp->size_id;
                $producSize->quantity = $producSize->quantity + $wareHouseTemp->quantity;
                $producSize->save();
            } else {
                $size = new ProductSize();
                $size->product_id = $wareHouseTemp->product_id;
                $size->size_id = $wareHouseTemp->size_id;
                $size->quantity = $wareHouseTemp->quantity;
                $size->save();
            }
            $wareHouseTemp->delete();
        }


        return redirect()->route('admin.warehouses.index')->with('message', 'Phiếu nhập hàng được thêm thành công.');
    }
}
