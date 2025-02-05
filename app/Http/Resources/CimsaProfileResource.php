<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CimsaProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "column" => $this->column,
            "label" => $this->label,
            "type" => $this->type,
            "text_content" => $this->text_content,
            'long_text_content' => $this->long_text_content,
            'multiple_value_content' => $this->multiple_value_content,
            "galleries" => GalleryResource::collection($this->galleries),
        ];
    }
}
