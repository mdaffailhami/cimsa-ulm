<?php

namespace App\Http\Resources\Committe;

use App\Http\Resources\GalleryResource;
use App\Http\Resources\Page\PageContactResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommitteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "logo" => $this->logo,
            "background" => $this->background,
            "name" => $this->name,
            "color" => $this->color,
            "description" => $this->description,
        ];
    }
}
