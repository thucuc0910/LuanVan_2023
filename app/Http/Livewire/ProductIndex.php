<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public $sliders, $products, $category, $categories, $priceInputs;
    protected $queryString = [
        'priceInputs' => ['expect' => '', 'as' => 'price'],
    ];

    public function mount($sliders, $products, $category, $categories)
    {

        $this->sliders     = $sliders;
        $this->products    = $products;
        $this->category    = $category;
        $this->categories  = $categories;
    }
    public function render()
    {
        // if(){

        // }
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->priceInputs, function ($q) {
                $q->when($this->priceInputs == 'high-to-low', function ($q2) {
                    $q2->orderBy('selling_price', 'DESC');
                })
                ->when($this->priceInputs == 'low-to-high', function ($q2) {
                    $q2->orderBy('selling_price', 'ASC');
                });
            })->where('status', '1')
            ->get();
        return view('livewire.product-index', [
            'sliders   ' => $this->sliders,
            'products  ' => $this->products,
            'category  ' => $this->category,
            'categories' => $this->categories,
        ]);
    }
}
