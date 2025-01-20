<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        "page_id",
        "column",
        "type",
        "group",
        "text_content",
        "image_content"
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'entity_id');
    }
}
