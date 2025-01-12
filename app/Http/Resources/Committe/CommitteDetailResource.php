<?php

namespace App\Http\Resources\Committe;

use App\Http\Resources\GalleryResource;
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
            "name" => $this->name,
            "color" => $this->color,
            "description" => $this->description,
            "long_description" => $this->long_description, // show if detailed
            "mission_statement" => $this->mission_statement, // show if detailed
            "activities" => CommitteActivityResource::collection($this->activities), // show if detailed
            "testimonies" => CommitteTestimonyResource::collection($this->testimonies), // show if detailed
            "focuses" => $focuses, // show if detailed
            "galleries" => GalleryResource::collection($this->galleries) // show if detailed
        ];
    }
}
