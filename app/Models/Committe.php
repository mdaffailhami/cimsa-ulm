<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Committe extends Model
{
    use HasUuids, SoftDeletes;

    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        "logo",
        "name",
        "color",
        "description",
        "long_description",
        "mission_statement",
    ];

    public function activities()
    {
        return $this->hasMany(CommitteActivity::class);
    }

    public function testimonies()
    {
        return $this->hasMany(CommitteTestimony::class);
    }

    public function focuses()
    {
        return $this->hasMany(CommitteFocus::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'entity_id');
    }

    public function contact()
    {
        return $this->hasOne(PageContact::class, 'page_id', 'uuid');
    }

    // Static Method
    public function syncActivities($activities)
    {
        foreach ($activities as $activity) {
            Log::info($activity);
            if (!empty($activity['id'])) {
                // Update existing activity
                $this->activities()->where('id', $activity['id'])->update([
                    'name' => $activity['name'],
                    'description' => $activity['description'],
                ]);
            } else {
                // Create new activity
                $this->activities()->create([
                    'name' => $activity['name'],
                    'description' => $activity['description'],
                ]);
            }
        }

        // Optionally, delete activities that are no longer in the request
        $activityIds = array_filter(array_column($activities, 'id'));
        $this->activities()->whereNotIn('id', $activityIds)->delete();
    }

    public function syncFocuses($focuses)
    {
        foreach ($focuses as $focus) {
            if (!empty($focus['id'])) {
                // Update existing focus
                $this->focuses()->where('id', $focus['id'])->update([
                    'description' => $focus['description'],
                ]);
            } else {
                // Create new focus
                $this->focuses()->create([
                    'description' => $focus['description'],
                ]);
            }
        }

        // Optionally, delete focuses that are no longer in the request
        $focusIds = array_filter(array_column($focuses, 'id'));
        $this->focuses()->whereNotIn('id', $focusIds)->delete();
    }

    public function syncGalleries($galleries)
    {
        $this->galleries()->delete();

        foreach ($galleries as $index => $gallery) {
            if ($gallery && str_starts_with($gallery, 'tmp/')) {
                $path_name = "avatar/page-contact";
                $image_name = uploadFile($path_name, $gallery);
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
