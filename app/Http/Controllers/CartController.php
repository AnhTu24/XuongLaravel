<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);
        
       
        $quantity = $request->input('quantity', 1);
        $color = $request->input('color'); // Lấy màu từ form
        $size = $request->input('size');   // Lấy kích cỡ từ form
    
       
        $cart = session()->get('cart', []);
    
        // Tính giá sau khi giảm giá
        $discount = $product->discount ?? 0; 
        $priceAfterDiscount = $product->price * (1 - $discount / 100);
    
     
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
          
            $cart[$id] = [
                "product_name" => $product->product_name,
                "quantity" => $quantity,
                "price" => $priceAfterDiscount,
                "color" => $color,  
                "size" => $size,    
                "image" => $product->image
            ];
        }
    
        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);
    
        return redirect()->back()->with('message', 'Add successful✅');
    }    
    


    public function showCart()
    {
        $cart = session()->get('cart', []);
        // dd($cart);
        return view('client.cart', compact('cart'));
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart');
    
        if ($request->quantity == 0) {
            // Xóa sản phẩm khỏi giỏ hàng nếu số lượng là 0
            unset($cart[$id]);
            session()->put('cart', $cart);
        } else {
            // Cập nhật số lượng
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
    
        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công!');
    }
    

    public function removeCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }
}
