<?php

namespace App\Http\Resources\Committe;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommitteTestimonyResource extends JsonResource
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
            "position" => $this->occupation,
            "description" => $this->description,
        ];
    }
}
