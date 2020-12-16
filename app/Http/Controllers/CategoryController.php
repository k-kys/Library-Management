<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addCategory()
    {
        return view('admin.add-category');
    }

    public function storeCategory(Request $request)
    {
        # code...
        $category = new Category();
        $category->name = $request->get('name');
        $category->created_at = date('Y-m-d H:i:s');
        $category->save();
        $request->session()->flash('status', 'Thêm danh mục thành công');
        return redirect()->route('admin.addCategory');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();
        $request->session()->flash('status', 'Cập nhật danh mục thành công');
        return redirect()->route('admin.manageCategory');
    }

    public function deleteCategory(Request $request, $id)
    {
        Category::find($id)->delete();
        $request->session()->flash('status', 'Xóa danh mục thành công');
        return redirect()->back();
    }

    public function manageCategory(Request $request)
    {
        $keyword = $request->get('keyword');
        $query = Category::query();
        if ($keyword) {
            $query->where('name', 'like', "%{$keyword}%")->orWhere('id', $keyword);
        }
        $categories = $query->paginate(3);
        return view('admin.manage-category', compact('categories'));
    }
}
