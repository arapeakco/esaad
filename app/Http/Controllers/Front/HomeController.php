<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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

        return view('front.index' , $data);
    }
}
