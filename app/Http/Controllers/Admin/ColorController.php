<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ColorController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:color-list|color-create|color-edit|color-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:color-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:color-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:color-delete', ['only' => ['destroy']]);

    }
    public function index(){
        $colors = Color::latest()->paginate(5);
        return view('admin.colors.index', compact('colors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.colors.create');
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

        $color = new Color;
        $color->name = $request->input('name');
        $color->code = $request->input('code');
        $color->status = $request->input('status') == true ? '1' : '0';
        $color->save();

        return redirect()->route('admin.colors.index')
            ->with('success', 'Color created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(color $color)
    {
        return view('admin.colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(color $color)
    {
        return view('admin.colors.edit', compact('color'));
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
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',

        ]);

        $color = Color::findOrFail($id);
        $color->name = $request->input('name');
        $color->code = $request->input('code');
        $color->status = $request->input('status') == true ? '1' : '0';
        $color->update();

        return redirect()->route('admin.colors.index')
            ->with('success', 'Color updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
        $color->delete();

        return redirect()->route('admin.colors.index')
            ->with('success', 'Color deleted successfully');
    }
}
