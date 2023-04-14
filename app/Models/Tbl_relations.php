<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tbl_relations extends Model
{
    use HasFactory;

    //thuoc tinh co the gan hang loat
    protected $fillable = [
        'user_send_id', 
        'user_nhan_id',
        'status',
    ];

    //quan he voi post
    public function user_rela()
    {
        return $this->hasManyThrough(User::class, Post::class, 'id_user', 'id', 'user_nhan_id', 'id');
    }
    
    public function post()
    {
        return $this->hasManyThrough(Post::class, User::class, 'id', 'id_user', 'user_nhan_id', 'id');
    }


    // public function relations(){

    //     return $this->hasMany(Post::class, 'id_user', 'user_nhan_id');
    // }

    public function user(){
        // if(Auth::user()->id == Tbl_relations::find(id)->user_nhan_id){
        //     return $this->hasMany(User::class, 'id','user_send_id');
        // }
        return $this->hasMany(User::class, 'id','user_nhan_id');
    }
    public function user1(){
        // if(Auth::user()->id == Tbl_relations::find(id)->user_nhan_id){
        //     return $this->hasMany(User::class, 'id','user_send_id');
        // }
        return $this->hasMany(User::class, 'id','user_send_id');
    }
    
}
