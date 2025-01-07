<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteFocus extends Model
{
    public $table = "committe_focuses";

    protected $fillable = [
        "committe_id",
        "description",
    ];
}
