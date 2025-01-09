<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CimsaProfile extends Model
{
    protected $fillable = [
        'columns',
        'type',
        'image_content',
        'text_content'
    ];
}
