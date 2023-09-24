<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductWareHouse;
use App\Models\Provider;
use App\Models\Size;
use App\Models\WareHouse;
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
        return view('admin.warehouse.create', [
            'products' => $products,
            'sizes' => $sizes,
            'providers' => $providers,
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

        foreach ($request->product_name as $key => $product_id) {
            $wareProductHouse = new ProductWareHouse();
            $wareProductHouse->ware_house_id = $wareHouse->id;
            $wareProductHouse->product_id = $request->product_name[$key];
            $wareProductHouse->size_id = $request->product_size[$key];
            $wareProductHouse->quantity = $request->product_quantity[$key] ?? 0;
            $wareProductHouse->save();

            // $producSize = ProductSize::findOrFail($request->product_name[$key], $request->product_size[$key]);

            $producSize = ProductSize::where('product_id',$request->product_name[$key])->where('size_id',$request->product_size[$key])->first();
            if ($producSize) {
                $producSize->product_id = $request->product_name[$key];
                $producSize->size_id = $request->product_size[$key];
                $producSize->quantity = $producSize->quantity + $request->product_quantity[$key];
                $producSize->save();
            } else {
                $size = new ProductSize();
                $size->product_id = $request->product_name[$key];
                $size->size_id = $request->product_size[$key];
                $size->quantity = $request->product_quantity[$key];
                $size->save();
            }
        }

        // if ($request->hasFile('image')) {
        //     $uploadPath = 'images/products/';
        //     $i = 1;
        //     foreach ($request->file('image') as $imageFile) {
        //         $ext = $imageFile->getClientOriginalExtension();
        //         $filename = time() . $i++ . '.' . $ext;
        //         $imageFile->move($uploadPath, $filename);
        //         $finalImagePathName = $uploadPath . $filename;

        //         productImage::create([
        //             'product_id' => $product->id,
        //             'image' => $finalImagePathName,
        //         ]);
        //     }
        // }

        // if ($request->colors) {
        //     foreach ($request->colors as $key => $color) {
        //         $product->productColors()->create([
        //             'product_id' => $product->id,
        //             'color_id' => $color,
        //             'quantity' => $request->colorQuantity[$key] ?? 0,

        //         ]);
        //     }
        // }

        return redirect()->route('admin.products.index')->with('message', 'Product Added Successfully.');
    }

    public function addRowProduct(Request $request){
        dd($request);
    }
}
