<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class materialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->status=='admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string',
            'type'=>'required|string',
            'link'=>'required',
            'course_id' => 'required|exists:courses,id',
        ];
    }
}
