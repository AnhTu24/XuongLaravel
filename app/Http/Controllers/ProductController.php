<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy 4 sản phẩm mới nhất
        $latestProducts = Product::with('category')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get()
            ->map(function ($product) {
                // Tính giá mới từ dữ liệu của bảng products
                $oldPrice = $product->price ?? 0;
                $discount = $product->discount ?? 0;

                // Tính giá mới sau khi áp dụng giảm giá
                $newPrice = $oldPrice - ($oldPrice * ($discount / 100));

                return [
                    'id' => $product->id,
                    'product_name' => $product->product_name,
                    'category_name' => $product->category ? $product->category->category_name : 'N/A',
                    'image' => $product->image,
                    'new_price' => $newPrice, // Giá sau khi giảm
                    'old_price' => $oldPrice, // Giá gốc
                    'discount' => $discount,  // Giảm giá %
                ];
            });

        // Lấy 4 sản phẩm có lượt xem cao nhất
        $hotProducts = Product::with('category')
            ->orderBy('view', 'desc')
            ->take(4)
            ->get()
            ->map(function ($product) {
                $oldPrice = $product->price ?? 0;
                $discount = $product->discount ?? 0;

                // Tính giá mới sau khi áp dụng giảm giá
                $newPrice = $oldPrice - ($oldPrice * ($discount / 100));

                return [
                    'id' => $product->id,
                    'product_name' => $product->product_name,
                    'category_name' => $product->category ? $product->category->category_name : 'N/A',
                    'image' => $product->image,
                    'new_price' => $newPrice, // Giá sau khi giảm
                    'old_price' => $oldPrice, // Giá gốc
                    'discount' => $discount,  // Giảm giá %
                ];
            });

        // Lấy tất cả danh mục
        $categories = Category::all();

        return view('client.index', compact('latestProducts', 'hotProducts', 'categories'));
    }


    public function shop(Request $request)
    {
        // Lấy dữ liệu tìm kiếm và danh mục từ request
        $search = $request->input('search');
        $categoryId = $request->input('category');

        // Truy vấn sản phẩm, không còn cần 'variants' nữa
        $products = Product::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('product_name', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('category_name', 'like', '%' . $search . '%');
                    });
            })
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->latest()
            ->paginate(8);

        // Tính toán giá mới từ bảng products
        foreach ($products as $product) {
            $oldPrice = $product->price ?? 0;
            $discount = $product->discount ?? 0;

            // Tính giá mới sau khi áp dụng giảm giá
            $newPrice = $oldPrice - ($oldPrice * ($discount / 100));

            // Gán giá trị cho từng sản phẩm
            $product->old_price = $oldPrice;
            $product->new_price = $newPrice;
        }

        // Lấy tất cả danh mục
        $categories = Category::all();

        // Trả về view với danh sách sản phẩm và danh mục
        return view('client.shop', compact('products', 'categories'));
    }



    public function detail($id)
    {
        // Lấy sản phẩm chính
        $product = Product::with('category')->find($id);

        // Lấy tất cả sản phẩm cùng category_id với sản phẩm chính, trừ sản phẩm chính
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();

        return view('client.detail', compact('product', 'relatedProducts'));
    }
}
