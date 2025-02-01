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
            'type' => $this->type,
            'text_content' => $this->text_content,
            'long_text_content' => $this->long_text_content,
            "galleries" => GalleryResource::collection($this->galleries)
        ];
    }
}
