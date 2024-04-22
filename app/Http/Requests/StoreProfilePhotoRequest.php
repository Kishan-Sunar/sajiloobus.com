<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\Rules\ImageFile;

class StoreProfilePhotoRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'profile_photo' => [
                'required',
                ImageFile::types(['png', 'jpeg', 'jpg'])
                    ->min(100)
                    ->max(12 * 3024)
            ],
        ];
    }
}
