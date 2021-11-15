<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersMissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mission_id',
    ];

    protected $attributes = [
        'is_done' => false,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mission(){
        return $this->belongsTo(Missions::class, 'mission_id');
    }
}
