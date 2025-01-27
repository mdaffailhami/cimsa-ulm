<?php

namespace App\Http\Resources\Committe;

use App\Http\Resources\GalleryResource;
use App\Http\Resources\Page\PageContactResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommitteDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $focuses = $this->focuses->map(function ($focus) {
            return $focus->description;
        });

        return [
            "logo" => $this->logo,
            "background" => $this->background,
            "name" => $this->name,
            "color" => $this->color,
            "description" => $this->description,
            "long_description" => $this->long_description,
            "mission_statement" => $this->mission_statement,
            "activities" => CommitteActivityResource::collection($this->activities),
            "testimonies" => CommitteTestimonyResource::collection($this->testimonies),
            "focuses" => $focuses,
            "galleries" => GalleryResource::collection($this->galleries),
            "contact" => new PageContactResource($this->contact)
        ];
    }
}
