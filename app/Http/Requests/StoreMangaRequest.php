<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMangaRequest extends FormRequest
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
            'id' => ['required', 'integer', 'unique:animes'],
            'title_english' => ['nullable', 'string', 'max:255'],
            'title_romaji' => ['nullable', 'string', 'max:255'],
            'volumes' => ['nullable', 'integer'],
            'chapters' => ['nullable', 'integer'],
            'status' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'genres' => ['nullable', 'array'],
            'genres.*' => ['nullable', 'string', 'max:255'], 
            'country_of_origin' => ['required', 'string', 'max:255'],
            'cover_image_path' => ['required', 'string'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'average_score' => ['nullable', 'integer'],
        ];
    }
}
