<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecommendationRequest;
use App\Item;
use App\Post;

class RecommendationController extends Controller
{


    public function index()
    {
        return view('panel.recommendations.index');
    }

    public function create()
    {
        return view('panel.recommendations.create');
    }

    public function store(RecommendationRequest $request)
    {
        $data = $request->all();
        $data['post_type_id'] = 5;

        $arr = ['specialization' => $data['specialization']];


        if ($file = $request->file('image')) {
            $arr['image'] = $file->store('images');
        }
        $data['data'] = $arr;

        Post::create($data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Post::findOrFail($id);
        return view('panel.recommendations.create', $data);
    }

    public function update(RecommendationRequest $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id);
        $data['post_type_id'] = 5;

        $arr = ['specialization' => $data['specialization']];

        if ($file = $request->file('image')) {
            $arr['image'] = $file->store('images');
        }else{
            $arr['image'] = $post->data['image'];
        }
        $data['data'] = $arr;

        Post::updateOrCreate(['id' => $id], $data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }


    public function destroy($id)
    {
        $item = Post::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }


    public function datatable()
    {
        $items = Post::query()->where('post_type_id', 5);
        return getDatatable($items);
    }
}
