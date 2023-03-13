<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/steamhousefolder/create')) {
            return [
                // 'location' => 'required',
            ];
        } else {
            return [
                // 'location' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            // 'location.required' => __('validation.required', ['attribute' => 'location']),

        ];
    }

}
