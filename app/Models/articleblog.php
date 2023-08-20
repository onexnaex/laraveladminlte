<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryBlog;

class articleblog extends Model
{
    use HasFactory;
    protected $table = 'article_blog';
    protected  $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'fk_category',
        'thumbnail'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryBlog::class,'fk_category','id');
    }
}
