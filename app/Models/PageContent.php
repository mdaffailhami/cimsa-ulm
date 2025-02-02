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

    public function syncGalleries($galleries)
    {
        $this->galleries()->delete();

        foreach ($galleries as $index => $gallery) {
            if ($gallery && str_starts_with($gallery, 'tmp/')) {
                $path_name = "committe";
                $image_name = $path_name . "/" . uploadFile($path_name, $gallery);
            } else {
                $image_name = $gallery;
            }

            $this->galleries()->create([
                "type" => 'committe',
                'url' => config('global')["backend_url"] . "/api/image/" .  $image_name,
                "order" => $index
            ]);
        }
    }
}
