<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Post;
use App\Transaction;

class TransactionController extends Controller
{

    public function index()
    {
        return view('panel.transactions.index');
    }


    public function datatable()
    {
        $items = Transaction::query();
        return getDatatable($items , ['member']);
    }
}
