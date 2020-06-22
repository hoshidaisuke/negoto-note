<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'attribute_id', 'content'];
    
    /*
    * この投稿を所有するユーザ
    **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    * この投稿を所有する属性
    **/
    public function attribute()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * この質問が所有するいいね
     */
    public function like_users()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }
    
}
