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

    public function contents()
    {
        return $this->hasMany(PageContent::class, 'page_id');
    }

    public function contact()
    {
        return $this->hasOne(PageContact::class, 'page_id');
    }
}
