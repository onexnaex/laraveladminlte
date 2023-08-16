<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoryBlog extends Model
{
    use HasFactory;
    protected $table = 'category_blog';
    protected  $primaryKey = 'id';
    protected $fillable = [
        'category_name'
    ];
}
