<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    //thuoc tinh co the gan hang loat
    protected $fillable = [
        'title', 
        'body',
        'id_user',
        'photo',
        'status'
    ];

    //quan he voi comments
    public function comments(){

        return $this->hasMany(Comment::class)
                    ->whereNull('parent_id')
                    ->orderBy('id', 'desc');
    }

    // public function relations(){
    //     return $this->hasMany(Tbl_relations::class,'user_nhan_id','id_user');
    // }
   
    // public function user(){

    //     return $this->belongsTo(User::class);
    // }
    // public function user_rela()
    // {
    //     return $this->hasManyThrough(User::class, Tbl_relations::class, 'user_nhan_id', 'id', 'id_user', 'user_send_id');
    // }
}
