<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{


    public function index()
    {
        return view('panel.items.index');
    }

    public function create()
    {
        return view('panel.items.create');
    }

    public function store(ItemRequest $request)
    {
        $item = Item::create($request->only(Item::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Item::findOrFail($id);
        return view('panel.items.create', $data);
    }

    public function update(ItemRequest $request, $id)
    {
        $item = Item::updateOrCreate(['id' => $id ] , $request->only(Item::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);

    }


    public function destroy($id)
    {
        $item = Item::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }


    public function datatable()
    {
        $items = Item::query();
        return getDatatable($items);
    }
}
