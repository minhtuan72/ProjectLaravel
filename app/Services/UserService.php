<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserService
{
    //hien thi danh sach user trong he thong
    public function index()
    {
            $user = DB :: table('users') 
                -> where('id','<>', Auth::user()->id)
                -> get();

            $check = DB::table('tbl_relations')
                    -> where('user_send_id','=', Auth::user()->id)
                    ->orwhere('user_nhan_id','=', Auth::user()->id);
            $check2 = $check -> pluck('user_nhan_id');
            $checkUser = $check -> get();

            return ['user'=>$user, 'checkUser'=>$checkUser];
    }

    //gui loi moi ket ban
    public function apply(Request $request)
    {
        $id = $request->id;
     
        $iduser = Auth::user()->id;

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

    //dong y ket ban
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
        
        return $id;
    }


    //hien thi danh sach ban be
    public function list()
    {
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

            return ['fen'=>$fen1,'ch'=>$ch1];
    }

    //hien thi profile ban be
    public function show(Request $request)
    { 
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
                return $sh;
            }else{  
                $sh='-1';             
                return $sh;
            }
    }

    //xoa ban be
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
}
