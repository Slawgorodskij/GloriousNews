<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'min:10', 'max:50', 'unique:news'],
            'description' => ['required', 'min:10', 'max:100'],
            'news_body' => ['required', 'max:1000'],
            'publish_date' => ['required', 'date'],
        ];
    }
}
