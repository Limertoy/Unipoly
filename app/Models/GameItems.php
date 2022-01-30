<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'user1_item',
        'user2_item',
        'user3_item',
        'user4_item'
    ];
}
