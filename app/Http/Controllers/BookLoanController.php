<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLoan;
use App\Models\Student;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    // BOOK LOAN MANAGEMENT

    // private $tblBookLoan = 'book_loan';
    // public function __construct($tblBookLoan)
    // {
    //     $this->tblBookLoan = 'book_loan';
    // }
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
        $request->session()->flash('status', 'Thêm phiếu mượn sách thành công');
        return redirect()->route('admin.addBookLoan');
    }

    public function editBookLoan($id)
    {
        $bookLoan = BookLoan::find($id)->first();
        // $students = Student::all();
        // $books = Book::all();
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

    public function manageBookLoan()
    {
        $bookLoans = BookLoan::all();
        return view('admin.manage-bookloan', compact('bookLoans'));
    }

    public function deleteBookLoan(Request $request, $id)
    {
        BookLoan::find($id)->delete();
        $request->session()->flash('status', 'Xoá phiếu mượn sách thành công');
        return redirect()->route('admin.manageBookLoan');
    }
}
