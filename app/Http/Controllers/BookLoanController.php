<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLoan;
use App\Models\Student;
use Auth;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin,students');
    }

    // ADMIN

    public function addBookLoan()
    {
        $students = Student::all();
        $books = Book::all();
        $dateIssued = date('Y-m-d');
        return view('admin.add-bookloan', compact('students', 'books', 'dateIssued'));
    }

    public function storeBookLoan(Request $request)
    {
        $bookLoan = new BookLoan();
        $bookLoan->student_id = $request->get('student_id');
        $bookLoan->book_id = $request->get('book_id');
        $bookLoan->date_issued = date('Y-m-d H:i:s');
        $bookLoan->date_due_for_return = $request->get('date_due_for_return');
        $bookLoan->save();
        // giảm 1 sách trong kho
        $book = Book::find($request->get('book_id'));
        $book->quantity_stock = $book->quantity_stock - 1;
        $book->save();
        $request->session()->flash('status', 'Thêm phiếu mượn sách thành công');
        return redirect()->route('admin.addBookLoan');
    }

    public function editBookLoan($id)
    {
        $bookLoan = BookLoan::find($id);
        return view('admin.edit-bookloan', compact('bookLoan'));
    }

    public function updateBookLoan(Request $request, $id)
    {
        $bookLoan = BookLoan::find($id);
        $bookLoan->date_returned = date('Y-m-d H:i:s');
        $bookLoan->amount_of_fine = $request->get('fine');
        $bookLoan->status = 1;
        $bookLoan->save();
        $request->session()->flash('status', 'Cập nhật phiếu mượn sách thành công');
        return redirect()->route('admin.manageBookLoan');
    }

    public function manageBookLoan(Request $request)
    {
        $keyword = $request->get('keyword');
        $query = BookLoan::query()->join('books', 'book_loan.book_id', '=', 'books.id')->join('students', 'book_loan.student_id', '=', 'students.id')->select('book_loan.id', 'students.name as student_name', 'books.name as book_name', 'book_loan.date_issued', 'book_loan.date_due_for_return', 'book_loan.date_returned', 'book_loan.status', 'book_loan.amount_of_fine');
        if ($keyword) {
            $query->where('books.name', 'like', "%{$keyword}%")->orWhere('students.name', 'like', "%{$keyword}%")->orWhere('book_loan.id', $keyword);
        }
        $bookLoans = $query->orderBy('book_loan.id', 'desc')->paginate(3);
        // dd($bookLoans);
        return view('admin.manage-bookloan', compact('bookLoans'));
    }

    public function deleteBookLoan(Request $request, $id)
    {
        BookLoan::find($id)->delete();
        $request->session()->flash('status', 'Xoá phiếu mượn sách thành công');
        return redirect()->route('admin.manageBookLoan');
    }

    // STUDENT

    public function borrow(Request $request, $book_id)
    {

        $book = Book::find($book_id);
        $quantityStock = $book->quantity_stock;
        $student = Auth::guard('students')->user();
        $dateIssued = date('Y-m-d');
        $dateDueForReturn = date('Y-m-d', strtotime($dateIssued . '+ 30 day'));
        return view('borrow', compact('student', 'book', 'dateIssued', 'dateDueForReturn', 'quantityStock'));
    }

    public function storeBorrow(Request $request)
    {
        # thêm phiếu mượn
        $bookLoan = new BookLoan();
        $bookLoan->student_id = $request->get('student_id');
        $bookLoan->book_id = $request->get('book_id');
        $bookLoan->date_issued = $request->get('date_issued');
        $bookLoan->date_due_for_return = $request->get('date_due_for_return');
        $bookLoan->save();
        // giảm 1 sách trong kho
        $book = Book::find($request->get('book_id'));
        $book->quantity_stock = $book->quantity_stock - 1;
        $book->save();
        $request->session()->flash('status', 'Bạn đã mượn sách thành công');
        return redirect()->route('home');
    }

    public function returnBorrow(Request $request, $id)
    {
        # tiền phạt
        $bookLoan = BookLoan::find($id);
        // tinh mức tiền phạt
        $dateReturn = date('Y-m-d');
        $dateDueForReturn = $bookLoan->date_due_for_return;
        $quahan = strtotime($dateReturn) - strtotime($dateDueForReturn);
        $motngay = 86400;
        if ($quahan < $motngay) {
            $fine = 0;
        } elseif ($motngay <= $quahan && $quahan <= ($motngay * 7)) {
            $fine = 20000;
        } elseif ($quahan <= ($motngay * 14)) {
            $fine = 50000;
        } else {
            $fine = $bookLoan->book->price;
        }
        // dd($quahan, $fine);
        $bookLoan->date_returned = $dateReturn;
        $bookLoan->amount_of_fine = $fine;
        $bookLoan->status = 1;
        $bookLoan->save();
        // tăng 1 sách trong kho
        $book = Book::find($bookLoan->book_id);
        $book->quantity_stock = $book->quantity_stock + 1;
        $book->save();
        $request->session()->flash('status', 'Cập nhật phiếu mượn sách thành công');
        return redirect()->route('book-borrowed');
    }
}
