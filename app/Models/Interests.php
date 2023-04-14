<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    use HasFactory, SoftDeletes;

    //thuoc tinh co the gan hang loat
    protected $fillable = [
        'column_interests',
    ];

 
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_interests', 'interest_id', 'user_id');
    }
}
