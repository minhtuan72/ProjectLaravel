<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $id = Auth::user()->id;

            $prof = DB :: table('users') 
                    -> select('*') 
                    -> where('id','=', $id);

            $prof1 = $prof -> get();
            return view('profiles.profile', compact('prof1'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $getphoto = '';
        if($request->hasFile('photo')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request, 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'photo.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'photo.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            
            //Lưu hình ảnh vào thư mục public/upload/hinhthe
            $photo = $request->file('photo');
            $getphoto = time().'_'.$photo->getClientOriginalName();
            $destinationPath = public_path('upload/photo');
            $photo->move($destinationPath, $getphoto);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        if(Auth::check()){
            $id = Auth::user()->id;

            $prof = DB :: table('users') 
                    -> select('*') 
                    -> where('id','=', $id);

            $prof1 = $prof -> get();
            return view('profiles.profile_edit', compact('prof1'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request )
    { 
        if(Auth::check()){
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

        
            return redirect()->intended('profile')
            ->withSuccess('Edit Success!');
        }
    
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
