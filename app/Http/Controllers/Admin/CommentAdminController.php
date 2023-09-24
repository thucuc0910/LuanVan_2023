<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CommentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::orderBy('id', 'DESC')->paginate(5);
        $products = Product::where('status',1)->get();
        $users = User::where('status',1)->get();
        // echo($data);
        return view('admin.comments.index', compact('comments','products','users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('status',1)->get();
        $users = User::where('status',1)->get();
        $comment = Comment::find($id);
        return view('admin.comments.show', compact('comment','products','users'));
    }

    /**F
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->route('admin.comments.index')
            ->with('success', 'User deleted successfully');
    }
}
