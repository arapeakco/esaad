<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{


    public function index()
    {
        return view('panel.settings');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($file = $request->file('site_logo')){
            $data['site_logo'] = $file->move(public_path() , 'logo.png');
        }

        Setting::setSetting($data);

        return back();
    }


    public function about()
    {
        return view('panel.about.create');
    }

    public function storeAbout(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);
        if ($file = $request->file('about_image')){
            $data['about_image'] = $file->store('images');
        }
        Setting::setSetting($data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function slider()
    {
        return view('panel.slider.create');
    }


    public function storeSlider(Request $request)
    {

        $rules = [
          'slider_percentage'   => 'required|numeric|min:0|max:100',
          'slider_bg'   => 'nullable|image',
        ];

        foreach (locales() as $key => $language) {
            $rules['slider_title_' . $key] = 'required|string';
            $rules['slider_description_' . $key] = 'required|string';
        }

        $validator = Validator::make($request->all() , $rules);
        if ($validator->fails()){
            return $this->response_api(false , $validator->errors()->first() , StatusCodes::VALIDATION_ERROR);
        }
        $data = $request->all();
        unset($data['_token']);
        if ($file = $request->file('slider_bg')){
            $data['slider_bg'] = $file->store('images');
        }
        Setting::setSetting($data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }
}
