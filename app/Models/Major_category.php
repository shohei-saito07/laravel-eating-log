<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major_category extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
