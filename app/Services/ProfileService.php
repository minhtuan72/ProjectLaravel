<?php

namespace App\Services;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProfileService
{
    use ValidatesRequests;
    public function index()
    {
            $id = Auth::user()->id;
            $prof = DB :: table('users') 
                    -> select('*') 
                    -> where('id','=', $id);

            $prof1 = $prof -> pluck('name');
            $test = User::find($id);
            // return view('show');
            return  $test;
    }

    public function edit()
    {
            $id = Auth::user()->id;

            $prof = DB :: table('users') 
                    -> select('*') 
                    -> where('id','=', $id);

            $prof1 = $prof -> get();
            // return view('profiles.profile_edit', compact('prof1'));
            return $prof1;
    }

    public function update($userData, $iduser)
    { 
           // dd($userData->name);
           
            //Xóa ảnh cũ
            $getHT = DB::table('users')->select('photo')->where('id', '=', Auth::user()->id)->get();
            if($getHT[0]->photo != '' && file_exists(public_path('upload/photo/'.$getHT[0]->photo)))
            {
                unlink(public_path('upload/photo/'.$getHT[0]->photo));
            }

            //Tải file lên thư mục upload/photo
            $image = $userData->file('photo');
            $avatarName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/photo'), $avatarName);
            $userData->photo = $avatarName;
            //Update dữ liệu
            User::where('id','=',$iduser)
                    ->update([
                            'name' => $userData->input('name'),
                            'address' => $userData->input('address',''),
                            'hobbies' => $userData->input('hobbies',''),
                            'job' => $userData->input('job',''),
                            'description' =>$userData->description,
                            'photo'=>$avatarName
                        ]);
                
            // DB::table('users')
            // ->where('id', '=', $iduser)
            // ->update([
            //     'name' => $userData->input('name'),
            //     'address' => $userData->input('address',''),
            //     'hobbies' => $userData->input('hobbies',''),
            //     'job' => $userData->input('job',''),
            //     'description' =>$userData->description,
            //     'photo'=>$avatarName
            // ]);
    }
}