<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Xetaio\Mentions\Models\Traits\HasMentionsTrait;

class Comment extends Model
{
    use HasFactory, SoftDeletes, HasMentionsTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 
        'post_id', 
        'parent_id', 
        'body',
        'id_tag'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function replies(){
        
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
