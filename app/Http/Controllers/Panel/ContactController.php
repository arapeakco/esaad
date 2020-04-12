<?php

namespace App\Http\Controllers\Panel;

use App\Admin;
use App\Constants\StatusCodes;
use App\Contact;
use App\Replay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{


    public function index()
    {
        Contact::query()->update(['read_at' => now()]);
        return view('panel.contacts.index');
    }

    public function destroy($id , Request $request)
    {
        $admin = Contact::find($id);
        return $admin->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {

        $items = Contact::orderByDesc('created_at');


        return getDatatable($items);

    }



}
