<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    use HasUuids;

    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        "name",
        "description"
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'entity_id');
    }
}
