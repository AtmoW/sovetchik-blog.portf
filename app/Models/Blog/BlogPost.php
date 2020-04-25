<?php

namespace App\Models\Blog;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    const  UNKNOWN_USER = 1;

    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'text',
        'excerpt',
        'published_at',
        'is_published' ,
        'user_id',
        'image_path'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
