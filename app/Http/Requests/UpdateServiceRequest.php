<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'key' => [
                'string',
                'required',
                'unique:services,key,' . request()->route('service')->id,
            ],
            'description' => [
                'string',
                'required',
            ],
            'icon' => [
                'string',
                'required',
            ],
            'duration' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
