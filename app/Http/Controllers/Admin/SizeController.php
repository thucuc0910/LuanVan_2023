<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SizeController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:color-list|color-create|color-edit|color-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:color-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:color-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:color-delete', ['only' => ['destroy']]);

    // }
    public function index(){
        $sizes = Size::latest()->paginate(5);
        return view('admin.sizes.index', compact('sizes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.sizes.create');
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
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',

        ]);

        $size = new Size;
        $size->name = $request->input('name');
        $size->code = $request->input('code');
        $size->status = $request->input('status') == true ? '1' : '0';
        $size->save();

        return redirect()->route('admin.sizes.index')
            ->with('success', 'Size được thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(size $size)
    {
        return view('admin.sizes.show', compact('size'));
    }

   
    public function edit(size $size)
    {
        return view('admin.sizes.edit', compact('size'));
    }

   
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',

        ]);

        $size = Size::findOrFail($id);
        $size->name = $request->input('name');
        $size->code = $request->input('code');
        $size->status = $request->input('status') == true ? '1' : '0';
        $size->update();

        return redirect()->route('admin.sizes.index')
            ->with('success', 'Size được cập nhật thành công.');
    }

    
    public function destroy(size $size)
    {
        $size->delete();

        return redirect()->route('admin.sizes.index')
            ->with('success', 'Size được xoá thành công');
    }
}
