<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';
    public $incrementing = false;

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
