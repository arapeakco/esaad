<?php

namespace App\Http\Requests;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'membership_id' => 'required|exists:posts,id',
            'amount' => 'required|numeric|min:1',
            'source.number'   => 'required|digits:16',
            'source.name' => 'required|string',
            'source.month' => 'required|numeric|between:1,12',
            'source.year' => 'required|numeric',
            'source.cvv' => 'required|digits:3',
            'name' => 'required|string',
            'phone' => 'required|numeric',
        ];
    }

}
