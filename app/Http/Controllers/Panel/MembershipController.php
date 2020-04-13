<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\MembershipRequest;
use App\Post;
use App\PostType;

class MembershipController extends Controller
{


    public function index()
    {
        return view('panel.memberships.index');
    }

    public function create()
    {
        return view('panel.memberships.create');
    }

    public function store(MembershipRequest $request)
    {
        $data = $request->all();
        $data['post_type_id'] = 2;

        $arr = ['price' => $data['price']];
        if ($file = $request->file('image')) {
            $arr['image'] =  $file->store('images');
        }
        $data['data'] = $arr;

        Post::create($data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Post::findOrFail($id);
        return view('panel.memberships.create', $data);
    }

    public function update(MembershipRequest $request, $id)
    {
        $data = $request->all();
        $item = Post::find($id);
        $data['post_type_id'] = 2;

        $arr = ['price' => $data['price']];
        if ($file = $request->file('image')) {
            $arr['image'] =  $file->store('images');
        }else{
            $arr['image'] = @$item->data['image'];
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
        $items = Post::query()->where('post_type_id', 2);
        return getDatatable($items);
    }
}
