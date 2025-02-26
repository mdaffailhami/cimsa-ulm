<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'author_id',
        'cover',
        'title',
        'slug',
        'highlight',
        'content',
        'created_at',
    ];

    protected $appends = [
        "is_published"
    ];

    public function getIsPublishedAttribute()
    {
        return Carbon::now()->greaterThan($this->created_at);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }
}
