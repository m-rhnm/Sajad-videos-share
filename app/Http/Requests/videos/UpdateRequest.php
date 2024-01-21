<?php

namespace App\Http\Requests\videos;

use App\Http\Requests\videos\StoreRequest;
//use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends StoreRequest
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
        return [
            'title' =>'required|min:3|max:128',
            'headline_id' =>'required|exists:headlines,id',
            'price'=>'required|numeric',
            'thumbnail_url'=>'image|mimes:png,jpg,jpeg|nullable',
            'demo_url'=>'file|mimetypes:video/mp4|nullable',
            'source_url'=>'file|mimetypes:video/mp4|nullable',
            'description'=>'required|min:10',
        ];
    }
}
