<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * キャストする必要のある属性
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }
}
