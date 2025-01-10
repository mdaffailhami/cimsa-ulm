<?php

namespace App\Http\Resources\Official;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfficialDivisionMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "image" => $this->image,
            "name" => $this->name,
            "email" => $this->email,
            "position" => $this->position
        ];
    }
}
