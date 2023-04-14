<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory, SoftDeletes;
    

    //thuoc tinh co the gan hang loat
    protected $fillable = [
        'user_id',         //id user (primary key)
        'location',        //vi tri hien tai
        'looking_for',     //nhu cau tim kiem(dang tim)
        'gender',          //gioi tinh
        'height',          //chieu cao
        'age',             //tuoi
        'languages_spoken',//ngon ngu noi
        'company',         //noi lam viec
        'high_school',     //truong cap 3
        'grad_school',     //dai hoc
        'education_level', //trinh do hoc van
        'your_kids',       //con cai
        'smoking',         //hut thuoc
        'drinking',        //uong ruou
        'religion',        //ton giao
        'interests',       //moi quan tam
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id','user_id');
    }
   
}
