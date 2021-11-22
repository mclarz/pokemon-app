<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = ['pokemon_id', 'user_id','status'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
