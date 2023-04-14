<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Xetaio\Mentions\Models\Traits\HasMentionsTrait;

class MatchUser extends Model
{
    use HasFactory, SoftDeletes, HasMentionsTrait;

    protected $dates = ['deleted_at'];
    

    //thuoc tinh co the gan hang loat
    protected $fillable = [
        'user_id',         //id user 
        'match_id',        //gui match
    ];

    
   
}
