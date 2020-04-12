<?php

namespace App\Http\Requests;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FaqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->id = $this->route('id');
        return auth('admin')->user()->can('manage_faqs');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        foreach (locales() as $key => $language) {
            $rules['question_' . $key] = 'required|string';
            $rules['answer_' . $key] = 'required|string';
        }
        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::VALIDATION_ERROR,
            'msg' => $validator->errors()->first()
        ], StatusCodes::VALIDATION_ERROR));
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::UNAUTHORIZED,
            'msg' => 'ليس لديك صلاحية'
        ], StatusCodes::UNAUTHORIZED));
    }
}
