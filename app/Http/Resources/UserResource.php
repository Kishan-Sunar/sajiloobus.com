<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $url = $this->profile_photo_path ? asset(Storage::url($this->profile_photo_path)) : $this->profile_photo_path;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'contact' => $this->contact,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'role' => $this->role,
            'profile_photo_path' => $url
        ];
    }
}
