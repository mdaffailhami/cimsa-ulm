<?php

namespace App\Http\Resources\Page;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            "name" => $this->name,
            "uri" => $this->uri,
            "contents" => PageContentResource::collection($this->contents),
            "contact" => new PageContactResource($this->contact)
        ];
    }
}
