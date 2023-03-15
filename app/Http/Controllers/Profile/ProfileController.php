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
        $id = Auth::user()->id;

        $prof = DB :: table('users') 
                -> select('*') 
                -> where('id','=', $id);

        $prof1 = $prof -> get();
        return view('profiles.profile', compact('prof1'));
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
        $id = Auth::user()->id;

        $prof = DB :: table('users') 
                -> select('*') 
                -> where('id','=', $id);

        $prof1 = $prof -> get();
        return view('profiles.profile_edit', compact('prof1'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request )
    { 
        //Kiểm tra ngoại lệ (Hiển thị ở page phải dùng $errors->has('photo'))
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

        // $prof = DB :: table('users') 
        //         -> select('*') 
        //         -> where('id','=', Auth::user()->id);

        // $prof2 = $prof -> find(Auth::user()->id);

        // $prof2->name = $request->name;
        // $prof2->email = $request->email;
        // $prof2->address = $request->address;
        // $prof2->hobbies = $request->hobbies;
        // $prof2->job = $request->job;
        // $prof2->description = $request->description;

        // $prof2->save();
        return redirect()->intended('profile')
        ->withSuccess('Edit Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
