<?php 
namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';

    public function index()
    {
        $data = Product::withTrashed()->latest('id')->paginate(8);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }
    

    public function create()
    {
        $categories = Category::all(); 
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'  => 'required|integer',
            'product_name' => 'required|max:255',
            'image'        => 'nullable|image|max:2048',
            'description'  => 'nullable|string',
            'view'         => 'nullable|integer',
            'size'         => 'nullable|string|max:50',
            'color'        => 'nullable|string|max:50',
            'price'        => 'required|numeric',
            'discount'     => 'nullable|numeric',
            'quantity'     => 'required|integer',
            'active'       => [
                'nullable',
                Rule::in([0, 1])
            ],
        ]);

        try {
            if ($request->hasFile('image')) {
                $data['image'] = Storage::put('products', $request->file('image'));
            }

            Product::query()->create($data);

            return redirect()
                ->route('admin.products.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            if (!empty($data['image']) && Storage::exists($data['image'])) {
                Storage::delete($data['image']);
            }

            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    public function edit(Product $product)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'category_id'  => 'required|integer',
        'product_name' => 'required|max:255',
        'image'        => 'nullable|image|max:2048',
        'description'  => 'nullable|string',
        'view'         => 'nullable|integer',
        'size'         => 'nullable|string|max:50',
        'color'        => 'nullable|string|max:50',
        'price'        => 'required|numeric',
        'discount'     => 'nullable|numeric',
        'quantity'     => 'required|integer',
        'active'       => [
            'nullable',
            Rule::in([0, 1])
        ],
    ]);

    // Xử lý giá tiền để loại bỏ định dạng không mong muốn
    $data['price'] = str_replace(',', '.', $request->input('price')); // Thay thế dấu phẩy bằng dấu chấm
    $data['price'] = floatval($data['price']); // Chuyển đổi sang số thực

    try {
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('products', $request->file('image'));
        }

        $currentImage = $product->image;

        $product->update($data);

        if ($request->hasFile('image') && !empty($currentImage) && Storage::exists($currentImage)) {
            Storage::delete($currentImage);
        }

        return back()->with('success', true);
    } catch (\Throwable $th) {
        if (!empty($data['image']) && Storage::exists($data['image'])) {
            Storage::delete($data['image']);
        }

        return back()
            ->with('success', false)
            ->with('error', $th->getMessage());
    }
}


    public function destroy(Product $product)
    {
        try {
           $product->delete();
           return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function forceDestroy(Product $product)
    {
        try {
            $product->forceDelete();

            if (!empty($product['image']) && Storage::exists($product['image'])) {
                Storage::delete($product['image']);
            }

            return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }
}
