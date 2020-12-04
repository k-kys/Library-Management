<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function addAuthor()
    {
        return view('admin.add-author');
    }

    public function storeAuthor(Request $request)
    {
        # code...
        $author = new Author();
        $author->name = $request->get('name');
        $author->created_at = date('Y-m-d H:i:s');
        $author->save();
        $request->session()->flash('status', 'Thêm Tác giả thành công');
        return redirect()->route('admin.addAuthor');
    }

    public function editAuthor($id)
    {
        $author = Author::where('id', $id)->first();
        return view('admin.edit-author', compact('author'));
    }

    public function updateAuthor(Request $request, $id)
    {
        Author::where('id', $id)->update([
            'name' => $request->get('name'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $request->session()->flash('status', 'Cập nhật tác giả thành công');
        return redirect()->route('admin.manageAuthor');
    }

    public function deleteAuthor(Request $request, $id)
    {
        Author::find($id)->delete();
        $request->session()->flash('status', 'Xóa tác giả thành công');
        return redirect()->back();
    }

    public function manageAuthor(Request $request)
    {
        $keyword = $request->get('keyword');
        $query = Author::query();
        if ($keyword) {
            $query->where('name', 'like', "%{$keyword}%")->orWhere('id', $keyword);
        }
        $authors = $query->orderBy('id', 'desc')->paginate(3);
        return view('admin.manage-author', compact('authors'));
    }
}
