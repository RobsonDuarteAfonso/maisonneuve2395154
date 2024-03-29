<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'date_birth',
        'city_id',
        'user_id'
    ];

    public function getRouteKeyName()
    {
        return 'user_id';
    }
}
