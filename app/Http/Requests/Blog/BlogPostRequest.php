<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
            'title' => 'required|min:3|max:200',
            'slug' => 'max:200',
            'text' => 'string|max:10000|min:300|required',
            'excerpt'=>'string|min:10|max:50|required',
            'category_id' => 'required|integer|exists:blog_categories,id'
        ];
    }
}
