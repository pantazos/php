<?php

namespace App\Http\Requests;

use App\Models\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_edit');
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
                'unique:categories,key,' . request()->route('category')->id,
            ],
            'color' => [
                'string',
                'required',
            ],
            'icon' => [
                'string',
                'required',
            ],
        ];
    }
}
