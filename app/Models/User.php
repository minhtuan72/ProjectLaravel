<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'hobbies',
        'job',
        'description',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function post()
    // {
    //     return $this->hasMany(Post::class, 'id_user')->where('status','=','public');
    // }
    public function rela()
    {
        return $this->hasMany(Tbl_relations::class, 'user_send_id','id')->where('status','=','Y'); 
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class, 'user_id','id'); 
    }
 
    public function interestFunction()
    {
        return $this->belongsToMany(Interests::class, 'user_interests', 'user_id', 'interest_id');
    }

    // public function rela2()
    // {
    //     return $this->hasMany(Tbl_relations::class, 'user_send_id') 
    //                                                                 ->where([
    //                                                                     ["user_send_id", '=', Auth::user()->id],
    //                                                                     ["status", '=', 'Y']
    //                                                                 ])
    //                                                                 ->orwhere([
    //                                                                     ["user_nhan_id", '=', Auth::user()->id],
    //                                                                     ["status", '=', 'Y']
    //                                                                 ])
    //                                                                 ; 
    // }

    // public function rela3()
    // {
    //     return $this->hasManyThrough(Tbl_relations::class, Tbl_relations::class, 'user_send_id', 'user_nhan_id');
    // }
    // public function userfr()
    // {
    //     return $this->hasMany(User::class,'id');
    // }
    // public function user_rela()
    // {
    //     return $this->hasManyThrough(Post::class, Tbl_relations::class, 'user_nhan_id', 'id_user', 'id', 'user_nhan_id');
    // }
}
