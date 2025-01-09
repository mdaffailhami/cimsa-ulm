<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteActivity extends Model
{
    protected $fillable = [
        "committe_id",
        "title",
        "description",
    ];
}
