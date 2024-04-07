<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Store extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['id','category_id', 'name', 'description', 'price', 'image', 'recommendation_flg'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorited_users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // reservations リレーションの件数をカウントする
    protected $withCount = ['reservations'];
}
