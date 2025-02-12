<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteTestimony extends Model
{
    protected $fillable = [
        "committe_id",
        "image",
        "name",
        "description",
        "occupation",
        'year',
        "content"
    ];
}
