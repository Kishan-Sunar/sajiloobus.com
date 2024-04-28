<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoutePointRequest extends FormRequest
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
            'schedule_id' => ['exists:schedules,id'],
            'location_id' => ['exists:locations,id'],
            'location_id' => Rule::unique('route_points')->where(function ($query) {
                return $query
                    ->where('location_id', $this->location_id)
                    ->where('type', $this->type)
                    ->where('schedule_id', $this->schedule_id);
            }),
        ];
    }
}
