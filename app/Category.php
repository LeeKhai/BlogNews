<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\News;


class Category extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id', 'description',
    ];

    public function news() {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
