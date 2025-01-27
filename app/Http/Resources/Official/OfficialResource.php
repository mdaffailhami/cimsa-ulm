<?php

namespace App\Http\Resources\Official;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfficialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "poster" => $this->poster,
            "year" => $this->year,
            "divisions" => OfficialDivisionResource::collection($this->divisions)
        ];
    }
}
