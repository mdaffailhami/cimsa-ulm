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
}
