<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContact extends Model
{
    protected $fillable = [
        "page_id",
        "image",
        "name",
        "occupation",
        "email",
        "phone",
        "start_year",
        "end_year"
    ];
}
