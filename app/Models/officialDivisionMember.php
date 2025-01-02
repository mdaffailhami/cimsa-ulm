<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficialDivisionMember extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'email',
        'position',
    ];
}
