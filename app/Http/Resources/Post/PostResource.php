<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $categories = $this->categories->map(function ($category) {
            return $category->name;
        });

        return [
            "cover" => $this->cover,
            "slug" => $this->slug,
            "title" => $this->title,
            "highlight" => $this->highlight,
            "content" => $this->content,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "categories" => $categories
        ];
    }
}
