<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Category;
class News extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'user_id', 'category_id', 'content', 'picture'];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
