<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficialDivision extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'official_id',
        'name',
    ];

    public function members()
    {
        return $this->hasMany(OfficialDivisionMember::class, 'official_division_id');
    }
}
