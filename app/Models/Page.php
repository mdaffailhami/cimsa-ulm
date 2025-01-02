<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasUuids, SoftDeletes;

    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        "name",
        "uri",
    ];

    public function content()
    {
        return $this->hasOne(PageContent::class);
    }

    public function contact()
    {
        return $this->hasOne(PageContact::class);
    }
}
