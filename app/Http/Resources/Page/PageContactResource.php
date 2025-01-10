<?php

namespace App\Http\Resources\Page;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageContactResource extends JsonResource
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
            "phone" => $this->phone,
            "occupation" => $this->occupation,
            "generation" => $this->start_year . "/" . $this->end_year,
        ];
    }
}
