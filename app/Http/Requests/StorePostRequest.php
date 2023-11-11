<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> da6431175b47998f83f2e4e5b6079c74e32f5d00
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required|max:255'
        ];
    }
}
