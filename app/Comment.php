<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\User;


class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content', 'parent_id', 'user_id', 'news_id'
    ];

    public function news() {
    	return $this->belongsTo(News::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

}
