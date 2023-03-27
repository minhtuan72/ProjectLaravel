<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $fen = DB :: table('users') 
                -> where('id','<>', Auth::user()->id);

            $fen1 = $fen -> get();

            $check = DB::table('tbl_relations')
                    -> where('user_send_id','=', Auth::user()->id)
                    ->orwhere('user_nhan_id','=', Auth::user()->id);
            $check2 = $check -> pluck('user_nhan_id');
            $check3 = $check -> get();
            return view('friends.friend', compact('fen1','check2', 'check3'));
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
    public function show(Request $request)
    { 
        if(Auth::check()){
            $id = $request -> id;
            $iduser = Auth::user()->id;
            $isExist =    DB :: table('tbl_relations') 
                    -> select('*')
                    ->where([
                        ["user_nhan_id", '=', $id],
                        ["user_send_id", '=', $iduser],
                        ["status", '=', 'Y']
                    ])
                    ->orwhere([
                        ["user_nhan_id", '=', $iduser],
                        ["user_send_id", '=', $id],
                        ["status", '=', 'Y']
                    ])
                    ->exists();
            
                    if ($isExist) {
                        $sh = DB :: table('users') 
                            -> where('id','=', $id)
                            ->first();
                        return view('friends.friend_page', compact('sh'));
                    }else{               
                        return 'Truy cap khong hop le!';
                    }
            }
            return redirect("login")->withSuccess('Opps! You do not have access');
    }

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
    public function add(Request $request)
    {
        $iduser = Auth::user()->id;
        $id = $request->id;
        $l = DB::table('tbl_relations')
                ->where([
                    ["user_nhan_id", '=', $iduser],
                    ["user_send_id", '=', $id]
                ])
                ->update([
                    'status' =>'Y',
                ]);
        
        return $l;
    }
    public function dele(Request $request)
    {
        $iduser = Auth::user()->id;
        $id = $request->id;
        $list = DB::table('tbl_relations')
                ->where([
                    ["user_nhan_id", '=', $id],
                    ["user_send_id", '=', $iduser]
                ])
                ->orwhere([
                    ["user_nhan_id", '=', $iduser],
                    ["user_send_id", '=', $id]
                ]);
        $list1 = $list->delete();
  
        return $list1;
    }

    public function apply(Request $request)
    {
        $id = $request->id;
     
        $iduser = Auth::user()->id;

        // $isExist = tbl_relations::select("*")
        //     ->where("user_nhan_id", $id)
        //     ->exists();

        //Kiem tra 2 user co quan he chua
        $isExist =    DB :: table('tbl_relations') 
                -> select('*')
                ->where([
                    ["user_nhan_id", '=', $id],
                    ["user_send_id", '=', $iduser]
                ])
                ->orwhere([
                    ["user_nhan_id", '=', $iduser],
                    ["user_send_id", '=', $id]
                ])
                ->exists();
                 
        if ($isExist) {
            echo 'Da co';
        }else{

            DB::table('tbl_relations')
            ->insert([
                'user_send_id' => $iduser,
                'user_nhan_id' => $id,
                'status' => 'N'
            ]);
            echo 'Da them';
        }
       
        echo $iduser;
        return $id;
    }

    public function list()
    {
        if(Auth::check()){
            $ch = DB::table('tbl_relations')
                    -> where([
                        ['user_send_id','=', Auth::user()->id],
                        ['status','=', 'Y']
                    ])
                    ->orwhere([
                        ['user_nhan_id','=', Auth::user()->id],
                        ['status','=', 'Y']
                    ]);
            $ch1 = $ch -> get();  
                
            $fen = DB :: table('users') 
                    -> where('id','<>', Auth::user()->id);

            $fen1 = $fen -> get();

            
        
            return view('friends.friend_list', compact('fen1','ch1'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
}
