<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_favorite extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_favorite_id';
    protected $fillable = [
        'user_id',
        'favorite_id',
    ];

}