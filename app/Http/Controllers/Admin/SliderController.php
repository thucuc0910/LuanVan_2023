<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:coupon-list|coupon-create|coupon-edit|coupon-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:coupon-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:coupon-edit', ['only' => ['edit', 'update', 'updateProdColorQty']]);
        // $this->middleware('permission:coupon-delete', ['only' => ['destroy', 'deleteImage', 'deleteProdColorQty']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(5);
        return view('admin.sliders.index', compact('sliders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',

        ]);

        $slider = new Slider;

        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/sliders/', $filename);
            $slider->image = $filename;
        }
        $slider->status = $request->input('status') == true ? '1' : '0';
        $slider->save();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(category $category)
    // {
    //     return view('admin.categories.show', compact('category'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        $slider = Slider::findOrFail($id);

        if ($slider) {
            $slider->title = $request->input('title');
            $slider->description = $request->input('description');
            if ($request->hasFile('image')) {
                $path = $slider->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('images/sliders/', $filename);
                $slider->image = $filename;
            }
            $slider->status = $request->input('status') == true ? '1' : '0';
            $slider->save();

            return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
        }else{
            return redirect()->route('admin.slider.index')->with('error', 'No Such Slider Id Found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(slider $slider)
    {
        $slider->delete();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully');
    }
}
