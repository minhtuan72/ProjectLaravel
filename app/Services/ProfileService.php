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

    public function update(Request $request )
    { 
            //dd($request->name);
            //Kiểm tra ngoại lệ (Hiển thị ở page phải dùng $errors->has('photo'))
            $this->validate($request, 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',

                    'name'=>'max:255',
                    'address'=>'max:255',
                    'hobbies'=>'max:255',
                    'job'=>'max:255',
                    'description'=>'max:4294967295 ',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'photo.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'name.max' => 'Nhập không quá 50 ký tự',
                    'address.max' => 'Nhập không quá 50 ký tự',
                    'hobbies.max' => 'Nhập không quá 50 ký tự',
                    'job.max' => 'Nhập không quá 50 ký tự',
                    'description.max' => 'Nhập không quá 4294967295 ký tự',
                ]
            );
           
            //Xóa ảnh cũ
            $getHT = DB::table('users')->select('photo')->where('id', '=', Auth::user()->id)->get();
            if($getHT[0]->photo != '' && file_exists(public_path('upload/photo/'.$getHT[0]->photo)))
            {
                unlink(public_path('upload/photo/'.$getHT[0]->photo));
            }

            //Tải file lên thư mục upload/photo
            $image = $request->file('photo');
            $avatarName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/photo'), $avatarName);

            //Update dữ liệu
            DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->update([
                'name' => $request->name,
                // 'email' => $request->email,
                'address' => $request->input('address',''),
                'hobbies' => $request->input('hobbies',''),
                'job' => $request->input('job',''),
                'description' =>$request->description,
                'photo'=>$avatarName
            ]);
    }
}