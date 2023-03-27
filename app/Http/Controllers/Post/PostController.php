<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Tbl_relations;
use App\Models\User;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale('vi'); 
        $post = Post::all();
        $posts = $post -> where('id_user','=', Auth::user()->id);
        // $date = DB::table('posts')->select('created_at')->where('id', '=',Auth::user()->id)->get();
        // $now = Carbon::now()->toDateTimeString();
        // $date1 =  Carbon::parse($date)->diffForHumans($now);
        
        return view('posts.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
                'body'=>'required',
                //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],			
            [
                //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                'photo.mimes' => 'Chỉ chấp nhận file ảnh với đuôi .jpg .jpeg .png .gif',
                'photo.max' => 'Chỉ chấp nhận file ảnh không lớn hơn 2mb',
                'body' => 'Khong de trong',
            ]
        );
        //Tải file lên thư mục upload/photo
        $image = $request->file('photo');
        $avatarName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/photo'), $avatarName);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'photo' => $avatarName,
            'status' => $request->status,
            'id_user' => Auth::user()->id,    
        ]);
    
        //Post::create($request->all());
    
        return redirect()->route('post');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $id = $request -> id;
        // $post1 = Post::find($id);
        $post2 = Post::all();
        $post = $post2 -> where('id_user','=', Auth::user()->id);
        return view('posts.show', compact('post'));
    }

    public function show_friend()
    {
        // $id = $request -> id;
        // $post1 = Post::find($id);
        // $post = Post::all();
        
        $iduser = Auth::user()->id;

        // $test1 =    DB :: table('tbl_relations') 
        //         -> select('user_nhan_id','user_send_id')
        //         ->where([
        //             ["user_send_id", '=', $iduser],
        //             ["status", '=', 'Y']
        //         ])
        //         ->orwhere([
        //             ["user_nhan_id", '=', $iduser],
        //             ["status", '=', 'Y']
        //         ])
        //         ->get();
        
        // $post1 =  DB :: table('posts') 
        //         -> select('id_user')
        //         -> get();
        
         
        $post5 = Tbl_relations::with('user_rela')
                                ->where([
                                    ["user_send_id", '=', $iduser],
                                    ["status", '=', 'Y']
                                ])
                                ->orwhere([
                                    ["user_nhan_id", '=', $iduser],
                                    ["status", '=', 'Y']
                                ])
                                -> get()
                                -> pluck('post'); 
        
        // $diff = $check->diff($post1);
        // $diff->all();


        
                // if ($isExist) {
                //     $sh = DB :: table('users') 
                //         -> where('id','=', $id)
                //         ->first();
                //     return view('friends.friend_page', compact('sh'));
                // }else{               
                //     return 'Truy cap khong hop le!';
                // }
        // $post0 = User::with('post','rela')
        //             -> whereRelation('rela', 'status', 'Y')
        //             -> get()
        //             -> pluck('post');
        return view('posts.post_friend', compact('post5'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.post_edit',compact('post'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       
    // //    if($request->photo === null ){
         
    // //      return "khong de trong";
    // //    } else{
    // //     $check = $request->photo;
    //     $request->validate(
    //         [
    //             'photo'=>'required', 
    //         ],
    //         [
    //             'photo' =>  'Khong de trong!',
    //         ]
    //     );
        
    //     return $request;
       
        $post1 = Post::find($request->id);
        $request->validate(
            [
                'title'=>'required',
                'body'=>'required',
                //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],			
            [
                //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                'photo.mimes' => 'Chỉ chấp nhận file ảnh với đuôi .jpg .jpeg .png .gif',
                'photo.max' => 'Chỉ chấp nhận file ảnh không lớn hơn 2mb',
                'body' =>  'Khong de trong!',
            ]
        );

        $getHT = DB::table('posts')->select('photo')->where('id', '=',$request->id)->get();
            if($getHT[0]->photo != '' && file_exists(public_path('upload/photo/'.$getHT[0]->photo)))
            {
                unlink(public_path('upload/photo/'.$getHT[0]->photo));
            }
            
        //Tải file lên thư mục upload/photo
        $image = $request->file('photo');
        if(!empty($image)){
            $avatarName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/photo'), $avatarName);
            $post = $post1->update([
                'title' => $request->title,
                'body' => $request->body,
                'photo' => $avatarName,
                'status' => $request->status,
            ]);
        }
        else{
            $post = $post1->update([
                'title' => $request->title,
                'body' => $request->body,
                'photo' => '',
                'status' => $request->status,
            ]);
        }
        
        return redirect()->intended('post-show')
            ->withSuccess('Edit Success!');
       
        //return $check;
    }

    public function dele(Request $request)
    {
         $post = Post::find($request->id);
         $post -> delete();
        return $request;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function test()
    {
        // $post = Tbl_relations::find(Auth::user()->id)->relations;
        // $post = Post::find(1);
        // $post = Tbl_relations::find(2,['user_send_id'])->user;
        // $post = User::find(Auth::user()->id)->post;
        // $post6 = User::find(10)->rela->pluck('user_nhan_id')->toArray();
        // // $post7 = User::find(10)->rela2->pluck('user_send_id')->toArray();
        // $post2 = array_merge($post6);
        // //$post5 = User::find(10)->rela3->pluck('user_nhan_id');
        // $post4 = Post::whereIn('id_user',$post2)
        //                 ->where('status','=','public')
        //                 ->get(); 
        // $post= User::with('rela','post')
        //                 ->whereIn('id',$post2)
        //                 ->get()
        //                 ->pluck('post');
        // // $post = User::with('userfr')->get();
            
        // $post = User::with('post','rela')
        //             ->whereHas('rela', function ( $query) {
        //                 $query->where('status', '=', 'Y');
        //                 })
        //             -> get()
                //    ;
        $iduser = Auth::user()->id;
        $post5 = Tbl_relations::with('user_rela')
                                ->where([
                                    ["user_send_id", '=', $iduser],
                                    ["status", '=', 'Y']
                                ])
                                ->orwhere([
                                    ["user_nhan_id", '=', $iduser],
                                    ["status", '=', 'Y']
                                ])
                                -> get()
                                -> pluck('post'); 
        
        // $post = User::with('post','rela2') 
        //                 // -> whereRelation('rela', 'status', 'Y')
        //                 // -> where('rela2')
        //                 -> get()
        //                 ;

        // $post5 = User::whereHas('rela', function ($query) {
        //                         $query->where('status', 'like', 'Y');
        //                 })->get();
        // $post3 = Tbl_relations::whereHas('user', function ($query) {
        //     $query->where([
        //         [ 'id', '=', Auth::user()->id],
        //         [ 'status', '=', 'Y']
        //     ]);
        // })->get(); 
        
        // $post = Post::whereHas('relations', function ($query) {
        //     $query->where([
                
        //         [ 'status', '=', 'Y']
        //     ]);
        // })->get();

        // $post = User::find(4)->post;
        // foreach ($post2 as $p) {
        //     echo $p;
        // }
        return view('test', compact('post5'));
    }
}
