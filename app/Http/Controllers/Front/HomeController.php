<?php

namespace App\Http\Controllers\Front;

use App\Constants\StatusCodes;
use App\Contact;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\PostType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['about'] = PostType::find(1);
        $data['membership'] = PostType::find(2);
        $data['expenses'] = PostType::find(3);
        $data['famous'] = PostType::find(4);
        $data['recommendations'] = PostType::find(5);
        $data['slider'] = PostType::find(6);

        $data['faqs'] = Faq::query()->paginate(5);
        return view('front.index' , $data);
    }

    public function faqsAjax()
    {
        $data['faqs'] = Faq::query()->paginate(2);
        $html = view('front.instance.faqs' , $data)->render();

        return response()->json([
            'status'    => true,
            'data'      => ['next' => $data['faqs']->nextPageUrl() , 'html' => $html]
        ],StatusCodes::OK);
    }

    public function storeContact(ContactRequest $request)
    {
        Contact::create($request->all());
        return $this->response_api(true, (getSetting('contactUs_response')??__('front.msgSent')) , StatusCodes::OK);
    }
}
