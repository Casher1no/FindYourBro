<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDislike extends Model
{
    use HasFactory;
    protected $table = 'user_dislikes';

    protected $fillable = [
        'userId',
        'dislikedUserId',
    ];
}
