<?php

namespace App\Http\Controllers\Panel;

use App\Admin;
use App\Constants\StatusCodes;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;

class FaqController extends Controller
{


    public function index()
    {
        return view('panel.faqs.index');
    }

    public function create()
    {
        return view('panel.faqs.create');
    }

    public function store(FaqRequest $request)
    {
        $item = Faq::create($request->only(Faq::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Faq::findOrFail($id);
        return view('panel.faqs.create', $data);
    }

    public function update(FaqRequest $request, $id)
    {
        $item = Faq::updateOrCreate(['id' => $id ] , $request->only(Faq::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);

    }


    public function destroy($id)
    {
        $item = Faq::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }


    public function datatable()
    {
        $items = Faq::query();
        return getDatatable($items);
    }
}
