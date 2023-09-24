<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {

            $validate = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);

            if ($validate->fails()) {
                return redirect()->back()->with('warning', 'Vui lòng nhập nội dung bình luận.');
            }

            $product = Product::where('id', $request->product_id)->where('status', 1)->first();

            if ($product) {

                Comment::create([
                    'product_id' => $request->product_id,
                    'user_id' => Auth::user()->id,
                    'comment_reply_id' => 0,
                    'comment_body' => $request->comment_body,

                ]);

                return redirect()->back()->with('success', 'Bình luận thành công.');
            } else {
                return redirect()->back()->with('warning', 'Không tìm thấy sản phẩm.');
            }
        } else {
            return redirect()->back()->with('danger', 'Vui lòng đăng nhập để có thể bình luận.');
        }
    }


    public function postReply(Request $request)
    {
        if (Auth::check()) {

            $validate = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'comment_body_reply' => 'required|string'
            ]);

            if ($validate->fails()) {
                return redirect()->back()->with('warning', 'Vui lòng nhập nội dung bình luận.');
            }

            $product = Product::where('id', $request->product_id)->where('status', 1)->first();

            if ($product) {

                Comment::create([
                    'product_id' => $request->product_id,
                    'user_id' => Auth::user()->id,
                    'comment_reply_id' => $request->comment_id,
                    'comment_body' => $request->comment_body_reply,

                ]);

                return redirect()->back()->with('success', 'Bình luận thành công.');
            } else {
                return redirect()->back()->with('warning', 'Không tìm thấy sản phẩm.');
            }
        } else {
            return redirect()->back()->with('danger', 'Vui lòng đăng nhập để có thể bình luận.');
        }
    }
}
