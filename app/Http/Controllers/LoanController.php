<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $loans = \App\Loan::where('user_id', $userId) -> paginate(10);


        return view('loans.index', compact('loans'));

    }

    public function devolution(Loan $loan)
    {
        $loan->devolution = true;
        //
        $loan->save();

        flash('Devolução realizada com sucesso')->success();

        return redirect()->route('loan.index');
    }


      public function loan(Request $request)
    {
        $bookId = $request->get('book_id');
        $userId = auth()->user()->id;
        $returnDate = Carbon::now()->addDays(7);
        Loan::create([

            'user_id' => $userId,
            'book_id' => $bookId,
            'return_date' => $returnDate,

        ]);


        flash('Empréstimo realizado com sucesso')->success();

        return redirect('admin/books');
    }

}
