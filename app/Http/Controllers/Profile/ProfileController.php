<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    public function __construct(private ProfileService $profileService)
    {
    }

    public function index()
    {
        if(Auth::check()){
            $test = $this->profileService->index();
            return Inertia::render('Profile/Show', [
                'user' => $test
            ]);
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function edit()
    {
        if(Auth::check()){
            $prof1 = $this->profileService->edit();
            return Inertia::render('Profile/Edit', [
                'prof' => $prof1
            ]);
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

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

            $iduser = Auth::user()->id;
            $this->profileService->update($request, $iduser);
        
            return redirect()->intended('profile')
            ->withSuccess('Edit Success!');
        }
    
        return redirect("login")->withSuccess('Opps! You do not have access');
    }



     /**
     * Store a newly created resource in storage.
     */
    //bo
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    /**
     * Update the specified resource in storage.
     */
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
