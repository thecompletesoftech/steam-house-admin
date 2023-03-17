<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/customerdatas/create')) {
            return [
                'Service_request' => 'required|max:150',
                // 'pictures' => 'required',
                'phone' => 'required|min:6|max:10|starts_with:1,2,3,4,5,6,7,8,9',
                'discription' => 'required',

            ];
        } else {
            return [
                'Service_request' => 'required|max:150',
                // 'pictures' => 'required',
                'phone' => 'required|numeric|min:6|max:10|starts_with:1,2,3,4,5,6,7,8,9',
                'discription' => 'required',

            ];
        }
    }

    public function messages()
    {
        return [
            'Service_request.required' => __('validation.required', ['attribute' => 'company_name']),
            // 'pictures.required' => __('validation.required', ['attribute' => 'pictures']),
            'number.required' => __('validation.required', ['attribute' => 'number']),
            'discription.required' => __('validation.required', ['attribute' => 'discription']),

        ];
    }

}
