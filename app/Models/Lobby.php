<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find()
 * @method static where(string $string, string $str)
 */
class Lobby extends Model
{
    use HasFactory;

    protected $fillable = [
        'user1_id',
        'user2_id',
        'user3_id',
        'user4_id',
        'winner_id',
        'token'
    ];

    protected $attributes = [
        'is_started' => false,
    ];

    protected $hidden = [
        'token',
    ];

    public function user1(){
        return $this->belongsTo(User::class);
    }

    public function user2(){
        return $this->belongsTo(User::class);
    }

    public function user3(){
        return $this->belongsTo(User::class);
    }

    public function user4(){
        return $this->belongsTo(User::class);
    }

    public function winner(){
        return $this->belongsTo(User::class);
    }

    public function game_money(){
        return $this->hasMany(GameMoney::class, 'game_id');
    }

    public function game_properties(){
        return $this->hasMany(GameProperties::class, 'game_id');
    }
}
