<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\PostType;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostTypeRequest;

class AdvocateController extends Controller
{


    public function index()
    {
        return view('panel.advocates.index');
    }

    public function create()
    {
        return view('panel.advocates.create');
    }

    public function store(PostTypeRequest $request)
    {
        $item = PostType::create($request->only(PostType::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = PostType::findOrFail($id);
        return view('panel.postTypes.create', $data);
    }

    public function update(PostTypeRequest $request, $id)
    {
        $item = PostType::updateOrCreate(['id' => $id ] , $request->only(PostType::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);

    }


    public function destroy($id)
    {
        $item = PostType::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }


    public function datatable()
    {
        $items = PostType::query();
        return getDatatable($items);
    }
}
