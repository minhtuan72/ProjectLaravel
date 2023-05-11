<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_relations;
use App\Models\User;
use App\Services\UserService;

class FriendController extends Controller
{
    //Khai bao ham khoi tao
    public function __construct(private UserService $userService)
    {
    }

    //hien thi danh sach user trong he thong
    public function index()
    {
        if(Auth::check()){
            $index = $this->userService->listUser();

            $fen1 = $index['user'];
            $check3 = $index['checkUser'];
            return view('friends.friend', compact('fen1', 'check3'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');   
    }

    //gui loi moi ket ban
    public function apply(Request $request)
    {
        $id = $request->id;
        $iduser = Auth::user()->id;

        return $this->userService->apply($id, $iduser);
    }

    //dong y ket ban
    public function add(Request $request)
    {
        $iduser = Auth::user()->id;
        $id = $request->id;

        return $this->userService->add($id, $iduser);
    }

    //xoa ban be
    public function dele(Request $request)
    {
        $iduser = Auth::user()->id;
        $id = $request->id;
        $list1 = $this->userService->dele($iduser, $id);
  
        return $list1;
    }

    //hien thi danh sach ban be
    public function list()
    {
        if(Auth::check()){
            $list = $this->userService->list();

            $ch1 = $list['ch'];
            $fen1 = $list['fen'];
        
            return view('friends.friend_list', compact('fen1','ch1'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    //hien thi profile ban be
    public function show(Request $request)
    { 
        if(Auth::check()){       
            $id = $request -> id;
            $iduser = Auth::user()->id;

            $show = $this->userService->show($id, $iduser);
            if ($show!='-1') {
                $sh = $show;
                return view('friends.friend_page', compact('sh'));
            }else{               
                return 'Khong phai ban be!';
            }
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
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function mentions(Request $request)
    {
        if(Auth::check()){
            // $ch = DB::table('tbl_relations')
            //         -> where([
            //             ['user_send_id','=', $request->id],
            //             ['status','=', 'Y']
            //         ])
            //         ->orwhere([
            //             ['user_nhan_id','=', $request->id],
            //             ['status','=', 'Y']
            //         ]);
            // $ch1 = $ch 
            //     -> select('user_send_id', 'user_nhan_id')    
            //     -> get();  
                
            // $fen = DB :: table('users') 
            //         -> select('name')
            //         -> where('id','<>', Auth::user()->id);

            // $fen1 = $fen -> get();

            // $frd = User::with('rela')->get();
            $frd = Tbl_relations::with('user')
                    ->where([
                        ['user_send_id','=',Auth::user()->id]
                        ])
                    ->get()
                    ->pluck('user')->toArray();
            $frd1 = Tbl_relations::with('user1')
                    ->where([
                        ['user_nhan_id','=',Auth::user()->id]
                        ])
                    ->get()
                    ->pluck('user1')->toArray();
            $fr = array_merge($frd, $frd1);  
              
            return $fr;

            // return view('test2', compact('frd'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
}
