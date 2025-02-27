<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{

    use HasUuids;

    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'poster',
        'year',
        'end_year',
    ];

    public function divisions()
    {
        return $this->hasMany(OfficialDivision::class, 'official_id');
    }

    public function posters()
    {
        return $this->hasMany(Gallery::class, 'entity_id');
    }

    public function syncPosters($posters)
    {
        $this->posters()->delete();

        foreach ($posters as $index => $poster) {
            if ($poster && str_starts_with($poster, 'tmp/')) {
                $path_name = "gallery/official-poster";
                $image_name = $path_name . "/" . uploadFile($path_name, $poster);
            } else {
                $image_name = $poster;
            }

            $this->posters()->create([
                "type" => 'official-poster',
                'url' => config('global')["backend_url"] . "/api/image/" .  $image_name,
                "order" => $index
            ]);
        }
    }
}
