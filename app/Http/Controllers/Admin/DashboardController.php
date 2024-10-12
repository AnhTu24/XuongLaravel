<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        // Thống kê số lượng sản phẩm ở từng danh mục
        $categories = Category::withCount('products')->get();
        $topProducts = Product::orderBy('view', 'desc')->take(5)->get(['product_name', 'view']);
    
        // Lấy tên danh mục và số lượng sản phẩm để vẽ biểu đồ
        $categoryNames = $categories->pluck('category_name')->toArray();
        $productCounts = $categories->pluck('products_count')->toArray();
    
        // Lấy tên sản phẩm và số lượt xem cho top sản phẩm
        $topProductNames = $topProducts->pluck('product_name')->toArray();
        $topProductViews = $topProducts->pluck('view')->toArray();
    
        return view('admin.index', compact(
            'categoryNames',
            'productCounts',
            'topProductNames',
            'topProductViews' // Đảm bảo rằng bạn truyền đúng biến
        ));
    }
    
}
