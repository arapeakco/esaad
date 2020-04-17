<?php

namespace App\Http\Controllers\Panel;

use App\Catagory;
use App\Course;
use App\Lecture;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {

        $data['transactions'] = Transaction::all()->count();
        $data['total_amount'] = Transaction::sum('amount');
        $data['successTransactions'] = Transaction::where('status' ,'paid')->count();
        $data['failedTransactions'] = Transaction::where('status' ,'failed')->count();

        return view('panel.index' ,$data );
    }
}
