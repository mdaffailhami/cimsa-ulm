<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    use HasUuids;

    protected $primaryKey = 'uuid';
    protected $incrementing = false;

    protected $fillable = [
        "name",
        "description"
    ];

    public function galeries()
    {
        return $this->hasMany(Gallery::class, 'program_id');
    }
}
