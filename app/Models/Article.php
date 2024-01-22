<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_title',
        'en_text',
        'fr_title',
        'fr_text',
        'user_id'
    ];
 
}
