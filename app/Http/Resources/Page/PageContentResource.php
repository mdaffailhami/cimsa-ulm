<?php

namespace App\Http\Resources\Page;

use App\Http\Resources\GalleryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'section' => $this->section,
            'column' => $this->column,
            'image_content' => $this->image_content,
            'text_content' => $this->text_content,
            "galleries" => GalleryResource::collection($this->galleries)
        ];
    }
}
