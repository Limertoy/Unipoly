<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Message extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'user_id'];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
