<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpensesRequest;
use App\Post;

class ExpensesController extends Controller
{


    public function index()
    {
        return view('panel.expenses.index');
    }

    public function create()
    {
        return view('panel.expenses.create');
    }

    public function store(ExpensesRequest $request)
    {
        $data = $request->all();
        $data['post_type_id'] = 3;

        if ($file = $request->file('image')) {
            $data['data'] = ['image' => $file->store('images')];
        }

        Post::create($data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Post::findOrFail($id);
        return view('panel.expenses.create', $data);
    }

    public function update(ExpensesRequest $request, $id)
    {
        $data = $request->all();
        $data['post_type_id'] = 3;
        if ($file = $request->file('image'))
            $data['data'] = ['image' => $file->store('images')];

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
        $items = Post::query()->where('post_type_id', 3);
        return getDatatable($items);
    }
}
