<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            "content" => "required|string",
            "image" => "required|image|mimes:png,jpg",
            "title" => ["required" , "string" , "max:255" , function($attribute,$value,$fail){
                if(str_contains($value,"laravel")){
                    $fail("The $attribute cannot contain the word 'laravel'");
                }
            }],
        ];
    }
}
