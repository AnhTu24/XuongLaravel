<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    const PATH_VIEW = 'admin.categories.';

    public function index()
    {
        $data = Category::withTrashed()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }


    public function create()
    {

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|max:255',
        ]);

        try {
            Category::query()->create($data);

            return redirect()
                ->route('admin.categories.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function show(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    public function edit(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'category_name' => 'required|max:255',
        ]);

        try {
            $category->update($data);

            return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function forceDestroy(Category $category)
    {
        try {
            $category->forceDelete();

            return back()->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('admin.categories.index')
        ->with('success', 'Category restored successfully!');
    }
}
