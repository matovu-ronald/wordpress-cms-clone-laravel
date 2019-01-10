<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts|max:255',
            'published_at' => 'date_format:Y-m-d H:i:s',
            'category_id' => 'required|numeric',
            'body' => 'required',
            'image' => 'mimes:jpg,jpeg,bmp,png,JPG,JPEG'
        ];

        switch ($this->method()) {
            case 'PUT':            
            case 'PATCH':
                $rules['slug'] = 'required|unique:posts,slug,'. $this->route('blog');
                break;
        }
        
        return $rules;
    }
}
