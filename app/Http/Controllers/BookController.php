<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    // BOOKS MANAGEMENT

    public function addBook()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.add-book', compact('authors', 'categories'));
    }

    public function storeBook(Request $request)
    {
        # code...
        $book = new Book();
        $book->name = $request->get('name');
        $book->author_id = $request->get('author_id');
        $book->price = $request->get('price');
        $book->created_at = date('Y-m-d H:i:s');
        $book->save();
        $book->categories()->attach($request->get('category_id'));
        $request->session()->flash('status', 'Thêm sách thành công');
        return redirect()->route('admin.addBook');
    }

    public function editBook($id)
    {
        $book = Book::where('id', $id)->first();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.edit-book', compact('book', 'authors', 'categories'));
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->get('name');
        $book->author_id = $request->get('author_id');
        $book->price = $request->get('price');
        $book->updated_at = date('Y-m-d H:i:s');
        $book->save();
        $book->categories()->sync($request->get('category_id'));
        $request->session()->flash('status', 'Cập nhật sách thành công');
        return redirect()->route('admin.manageBook');
    }

    public function deleteBook(Request $request, $id)
    {
        // $this->books->where('id', $id)->delete();
        // DB::table('books')->delete($id);
        Book::find($id)->delete();
        $request->session()->flash('status', 'Đã xóa sách');
        return redirect()->back();
    }

    public function manageBook()
    {
        $books = Book::all();
        return view('admin.manage-book', compact('books'));
    }
}
