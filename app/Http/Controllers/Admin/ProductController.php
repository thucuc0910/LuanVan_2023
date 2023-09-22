<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update', 'updateProdColorQty']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy', 'deleteImage', 'deleteProdColorQty']]);
        // $this->middleware('permission:product-image', ['only' => ['deleteImage']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('admin.products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->paginate(5);
        $colors = Color::where('status', '1')->get();

        return view('admin.products.create', compact('categories', 'colors'));
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
            'category_id' => 'required|integer',
            'name' => 'required',
            'slug' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            // 'quantity' => 'required|integer',
            'meta_title' => 'required|max:255',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'image' => 'nullable'

        ]);

        // $category = Category::findOrFail('category_id');

        $product = new Product;
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('slug'));
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        // $product->quantity = $request->input('quantity');
        $product->trending = $request->input('trending') == true ? '1' : '0';
        $product->status = $request->input('status') == true ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->meta_description = $request->input('meta_description');
        $product->save();

        if ($request->hasFile('image')) {
            $uploadPath = 'images/products/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $ext;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                productImage::create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorQuantity[$key] ?? 0,

                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('message', 'Product Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $id = $product->id;
        $categories = Category::latest()->paginate(5);

        $product = Product::findOrFail($id);
        $product_color = $product->productColors()->pluck('color_id')->toArray();
        $colors = Color::WhereNotIn('id', $product_color)->get();
        return view('admin.products.edit', compact('product', 'categories', 'product', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'category_id' => 'required|integer',
            'name' => 'required',
            'slug' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            // 'quantity' => 'required|integer',
            'meta_title' => 'required|max:255',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'image' => 'nullable'

        ]);

        $product = Product::findOrFail($id);
        if ($product) {
            $product->category_id = $request->input('category_id');
            $product->name = $request->input('name');
            $product->slug = Str::slug($request->input('slug'));
            $product->small_description = $request->input('small_description');
            $product->description = $request->input('description');
            $product->original_price = $request->input('original_price');
            $product->selling_price = $request->input('selling_price');
            $product->quantity = $request->input('quantity');
            $product->trending = $request->input('trending') == true ? '1' : '0';
            $product->status = $request->input('status') == true ? '1' : '0';
            $product->meta_title = $request->input('meta_title');
            $product->meta_keyword = $request->input('meta_keyword');
            $product->meta_description = $request->input('meta_description');
            $product->save();

            if ($request->hasFile('image')) {
                $uploadPath = 'images/products/';
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $ext = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $ext;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;

                    productImage::create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            if ($request->colors) {
                foreach ($request->colors as $key => $color) {

                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorQuantity[$key] ?? 0,
                    ]);
                }
            }

            return redirect()->route('admin.products.index')->with('success', 'Product Updated Successfully.');
        
        } else {

            return redirect()->route('admin.products.index')->with('error', 'No Such Product Id Found.');

        }

    }


    public function deleteImage($product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()
            ->with('success', 'Product image delete successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function updateProdColorQty(Request $request)
    {

        $idProduct = $request->product_id;
        $idProductColor = $request->prod_color_id;

        $productColorData = Product::findOrFail($idProduct)
            ->productColors()->where('id',  $idProductColor)->first();
        $productColorData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Product Color Qty updated']);
    }

    public function deleteProdColorQty($prod_color_id)
    {


        $productColor = ProductColor::findOrFail($prod_color_id);
        $productColor->delete();
        return response()->json(['message' => 'Product Color deleted']);
    }
}
