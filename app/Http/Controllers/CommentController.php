<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
        ]);

        return back()->with('success', 'Bình luận đã được thêm!');
    }

    public function index(Product $product)
    {
        // Assuming your Product model has a 'comments' relationship
        $comments = $product->comments()->with('user')->get(); // Eager load the user relationship
        return view('admin.products.product_comments', compact('product', 'comments')); // Pass product and comments to the view
    }

    public function destroy(Comment $comment)
    {
        try {
           $comment->delete();
           return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }
}
