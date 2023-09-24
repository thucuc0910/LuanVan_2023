<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\WareHouseTemp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WareHouse extends Component
{
    public $providers, $products, $sizes, $warehouseTemps;
    public $productQuantity = 0;
    public $productPriceImport = 0;
    
    public $productSize = 0;

    protected $listeners = ['addProduct' => 'refresh'];

    public function addProduct($productId)
    {
        if(Auth::check()){
            $temp = WareHouseTemp::where('product_id',$productId)->where('user_id',auth()->user()->id)->where('size_id',$this->productSize)->first();
            if($temp == null){
                WareHouseTemp::create([
                    'product_id' => $productId,
                    'user_id' => auth()->user()->id,
                    'size_id' => $this->productSize,
                    'quantity' => $this->productQuantity,
                    'price_import' => $this->productPriceImport,
                ]);
                $this->redirect('/admin/warehouses/create');
            }else{
                $total = $temp->quantity + $this->productQuantity;
                $temp->update([
                    'quantity' => $total
                ]);
                $this->redirect('/admin/warehouses/create');
            }
        }
    }

    public function deleteProduct($productId, $sizeId)
    {
        if(Auth::check()){
            $temp = WareHouseTemp::where('product_id',$productId)->where('user_id',auth()->user()->id)->where('size_id',$sizeId)->first();
            $temp->delete();
            $this->redirect('/admin/warehouses/create');
        }
    }

    public function mount($providers, $products, $sizes, $warehouseTemps)
    {
        $this->providers = $providers;
        $this->products = $products;
        $this->sizes = $sizes;
        $this->warehouseTemps = $warehouseTemps;
    }

    public function render()
    {
        $this->products = Product::where('status', 1)->get();
        return view('admin.livewire.ware-house', [
            'providers' => $this->providers,
            'products' => $this->products,
            'sizes' => $this->sizes,
            'warehouseTemps' => $this->warehouseTemps
        ]);
    }
}
