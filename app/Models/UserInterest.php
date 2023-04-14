<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory, SoftDeletes;
    

    //thuoc tinh co the gan hang loat
    protected $fillable = [
            'user_id',
            'interest_id',
            'version',
    ];

    
   
}
