<?php

namespace App\Http\Requests\videos;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return 
        [
            'title' =>'required|min:3|max:128',
            'headline_id' =>'required|exists:headlines,id',
            'price'=>'required|numeric',
            'thumbnail'=>'required|image|mimes:png,jpg,jpeg',
            'demo'=>'required|file|mimetypes:video/mp4',
            'source'=>'required|file|mimetypes:video/mp4',
            'description'=>'required|min:10',
        ];
    }
}
