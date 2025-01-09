<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    public $table = "social_medias";

    protected $fillable = [
        'platform',
        'url',
    ];
}
