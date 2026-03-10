<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $bookId = $this->route('book')?->id;

        return [
            'author_id'    => ['required', 'integer', 'exists:authors,id'],
            'title'        => ['required', 'string', 'max:255'],
            'isbn'         => ['required', 'string', Rule::unique('books', 'isbn')->ignore($bookId)],
            'description'  => ['nullable', 'string'],
            'price'        => ['required', 'numeric', 'min:0'],
            'published_on' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'author_id.exists' => 'The selected author does not exist.',
            'isbn.unique'      => 'A book with this ISBN already exists.',
        ];
    }
}