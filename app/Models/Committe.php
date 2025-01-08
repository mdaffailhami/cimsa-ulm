<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
