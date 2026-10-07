<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreReadingRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'manga_id' => 'required|integer|exists:mangas,id',
            'volumes_read' => 'nullable|integer',
            'chapters_read' => 'nullable|integer',
            'status' => 'required|string',
            'score' => 'nullable|integer',
            'notes' => 'nullable|string',
        ];
    }
}
