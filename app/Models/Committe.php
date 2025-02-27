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

    public function syncTestimonies($testimonies)
    {
        // Optionally, delete testimonies that are no longer in the request
        $testimonyIds = array_filter(array_column($testimonies, 'id'));
        $this->testimonies()->whereNotIn('id', $testimonyIds)->delete();

        foreach ($testimonies as $testimony) {
            $data = [
                'name' => $testimony['name'],
                'occupation' => $testimony['occupation'],
                'year' => $testimony['year'],
                'description' => $testimony['description'],
            ];

            if ($testimony['avatar'] && str_starts_with($testimony['avatar'], 'tmp/')) {
                $path_name = "avatar/page-contact";
                $image_name = uploadFile($path_name, $testimony['avatar']);

                $data['image'] = config('global')["backend_url"] . "/api/image/" . $path_name . "/" . $image_name;
            }

            if (!empty($testimony['id'])) {
                // Update existing activity
                $this->testimonies()->where('id', $testimony['id'])->update($data);
            } else {
                // Create new activity
                $this->testimonies()->create($data);
            }
        }
    }

    public function syncActivities($activities)
    {
        // Optionally, delete activities that are no longer in the request
        $activityIds = array_filter(array_column($activities, 'id'));
        $this->activities()->whereNotIn('id', $activityIds)->delete();

        foreach ($activities as $activity) {
            $data = [
                'name' => $activity['name'],
                'description' => $activity['description'],
            ];

            if (!empty($activity['id'])) {
                // Update existing activity
                $this->activities()->where('id', $activity['id'])->update($data);
            } else {
                // Create new activity
                $this->activities()->create($data);
            }
        }
    }

    public function syncFocuses($focuses)
    {
        // Optionally, delete focuses that are no longer in the request
        $focusIds = array_filter(array_column($focuses, 'id'));
        $this->focuses()->whereNotIn('id', $focusIds)->delete();

        foreach ($focuses as $focus) {
            $data = [
                'description' => $focus['description'],
            ];

            if (!empty($focus['id'])) {
                // Update existing focus
                $this->focuses()->where('id', $focus['id'])->update($data);
            } else {
                // Create new focus
                $this->focuses()->create($data);
            }
        }
    }

    public function syncGalleries($galleries)
    {
        $this->galleries()->delete();

        foreach ($galleries as $index => $gallery) {
            if ($gallery && str_starts_with($gallery, 'tmp/')) {
                $path_name = "gallery/committe";
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
