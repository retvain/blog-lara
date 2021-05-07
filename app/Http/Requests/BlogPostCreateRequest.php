<?php


namespace App\Http\Requests;


class BlogPostCreateRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:200|unique:blog_posts',
            'slug' => 'max:200',
            'content_raw' => 'required|string|min:5|max:10000',
            'category_id' => 'required|integer|exists:blog_categories,id',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'title.required' => 'Insert header of post',
            'content_raw.min' => 'Minimum length post :min symbols',
        ];
    }

    /**
     * JUST FOR TEST
     *
     * @return string[]
     */
    public function attributes()
    {
        return [
            'title' => 'Header',
        ];
    }

}
