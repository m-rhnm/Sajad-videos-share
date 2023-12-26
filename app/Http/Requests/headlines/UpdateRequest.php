<?php

namespace App\Http\Requests\headlines;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|min:5|max:128|unique:headlines,title,' . $this->request->get('headline_id') .'',
            'slug' => 'required|min:5|max:128|unique:headlines,slug,' .$this->request->get('headline_id') .'',
        ];
    }
}
