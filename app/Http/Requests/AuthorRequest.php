<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $authorId = $this->route('author')?->id;

        return [
            'name'    => ['required', 'string', 'max:150'],
            'email'   => ['required', 'email', Rule::unique('authors', 'email')->ignore($authorId)],
            'bio'     => ['nullable', 'string'],
            'born_on' => ['nullable', 'date', 'before:today'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'An author with this email already exists.',
            'born_on.before' => 'Date of birth must be in the past.',
        ];
    }
}