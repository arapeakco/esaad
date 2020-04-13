<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Post;
use App\PostType;

class AboutController extends Controller
{


    public function index()
    {
        $data['item'] = Post::query()->where('post_type_id' , 1)->first();
        return view('panel.about.create' , $data);
    }

    public function store(AboutRequest $request)
    {

        $item = Post::query()->where('post_type_id' , 1)->first();
        $data = $request->all();
        $data['post_type_id'] = 1;
        $arr = [];
        $arr['video'] = @getVedioData($data['url'])['embeded_id'];

        if ($file = $request->file('image')) {
            $arr['image'] = $file->store('images');
        }else{
            $arr['image'] = @$item->data['image'];
        }
        $data['data'] = $arr;
        Post::query()->updateOrCreate(['id' => @$item->id ] , $data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }


}
