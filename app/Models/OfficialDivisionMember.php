<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficialDivisionMember extends Model
{

    protected $fillable = [
        'image',
        'name',
        'email',
        'position',
    ];
}
