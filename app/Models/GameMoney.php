<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMoney extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'money',
    ];

    public function lobby(){
        return $this->belongsTo(Lobby::class, 'game_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
