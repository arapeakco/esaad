<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\SliderRequest;
use App\Post;
use App\PostType;

class SliderController extends Controller
{


    public function index()
    {
        $data['item'] = Post::query()->where('post_type_id' , 6)->first();
        return view('panel.slider.create' , $data);
    }

    public function store(SliderRequest $request)
    {
        $item = Post::query()->where('post_type_id' , 6)->first();
        $data = $request->all();
        $data['post_type_id'] = 6;
        $arr = [];

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
