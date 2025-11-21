<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Change to true to authorize access to user to store note
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // "unique:notes,title" means "Must be unique in the notes table"
        return [
            'title' => 'required|string|min:3|max:255|unique:notes,title',
            'content' => 'required|string|min:10',
        ];
    }
}
