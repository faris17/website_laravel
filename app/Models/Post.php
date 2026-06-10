<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    //relation to users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //relation to categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
