<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\MatchUser;
use App\Models\UserInterest;
use App\Models\Interests;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class MatchingService
{
    public function index()
    {
            $userDetail = User::with('detail')->find(Auth::user()->id);       
            if($userDetail->detail==null){
                return view('matching.match_profile_edit_new');
            }else{
                $itr_id = User::with('interestFunction')->find(Auth::user()->id)->interestFunction->pluck('id');
                
                //sap xep khi tra ve mang collection
                $user_match = Interests::with('user')->find($itr_id);
                $id = $user_match->pluck('user')->collapse()->pluck('id')->countBy()->keys()->take(20);
                //$user1 = DB::select('SELECT user_id, COUNT(1) as count FROM user_interests WHERE interest_id IN $itr_id GROUP BY user_id ORDER BY count DESC');
                //sapxep khi truy van - toi uu hon
                $id1 = UserInterest::select('user_id')
                                    ->selectRaw('COUNT(1) as count')
                                    ->groupBy('user_id')
                                    ->orderByDesc('count')
                                    ->whereIn('interest_id',$itr_id)
                                    ->take(20)
                                    ->pluck('user_id');
                // dd($user2);
                // $id1 = $user->pluck('user')->collapse()->pluck('id')->take(20);
                //dd($id);
                //$match = array_keys(array_count_values($id->toArray()));

                // $interests = str_replace(',', '|', $userDetail->detail->interests);
                // $itr = str_replace(',', '","', $userDetail->detail->interests);
                //dd($interests);
                //dd(json_encode($userDetail->detail->interests));
                // $test = UserInterest::min('user_id');
                //dd($test);
                // $match = UserDetail::where('interests','regexp',$interests)->pluck('user_id');
                //$user = UserDetail::with('user')->find(Auth::user()->id);
                //$user1 = User::with('detail')->find($id);
                $id_user = $id1->toArray();
                if($id_user != null){
                    $user = User::with('detail')
                            ->whereIn('id', $id_user)
                            ->orderByRaw('FIELD(id, ' . implode(',', $id_user) . ')')
                            ->get()
                            ->take(10);
                } else{
                    $user = User::with('detail')
                            ->get()
                            ->random(5);
                    //return view('matching.match_profile_edit_new');
                }
                
                //dd($test);
                //$match->whereJsonContains('interests', 'interests-1');
                //dd($user->id);
                return $user;
            }
    }

    public function show()
    {
        $isExist = UserDetail::select("*")
            ->where("user_id",'=' , Auth::user()->id)
            ->exists();

        if ($isExist) {
            $match = User::with('detail')->find(Auth::user()->id);
            $tmp = explode(',',$match->detail->languages_spoken);
            $match->detail->languages_spoken = $tmp;
            return $match;
            // return view('matching.match_profile', compact('match'));
        }else{
            $ch = '-1';
            return $ch;
        }
        
        //dd($match->detail->languages_spoken);
        
    }

    public function edit()
    {
            // $match = Post::find($id);
            $match = User::with('detail')->find(Auth::user()->id);
            // $match = User::with('detail')
            //                 ->where('id','=',Auth::user()->id)
            //                 ->get()
            //                 ->pluck('detail');
            
            //return view('matching.match_profile_edit');
            // return view('matching.match_profile_edit', compact('match'));
            return $match;   
     
    }
    public function update(Request $request)
    {
        //dd(UserInterest::where('user_id','=',Auth::user()->id)->min('created_at'));
        $time = Carbon::now('Asia/Ho_Chi_Minh');
        
        $itr = $request->interests;
        for($i = 0; $i< count($itr); $i++){
            $id_itr =Interests::where('column_interests','=',$itr[$i])->pluck('id')->first();
            UserInterest::Insert([
                'user_id'       => Auth::user()->id,
                'interest_id'   => $id_itr,
                'version'       => '0',
                'created_at'     => $time,
            ]);
            //dd($id_itr);
        }
        $min_time = UserInterest::where('user_id','=',Auth::user()->id)->min('created_at');
        $max_time = UserInterest::where('user_id','=',Auth::user()->id)->max('created_at');
        if($min_time != $max_time){
            UserInterest::where([
                ['user_id', '=', Auth::user()->id],
                ['created_at', '=', $min_time]
            ])->forceDelete();
        }
        // $isExistInterest = UserInterest::select("*")
        //     ->where("user_id",'=' , Auth::user()->id)
        //     ->exists();
        // if ($isExistInterest) {
        //     $inter1 = UserInterest::where('user_id','=',Auth::user()->id);
        //     $inter = $inter1->update([
        //         'user_id'       => Auth::user()->id,
        //         'interests-1'   => $itr[1],
        //         'interests-2'   => $itr[2],
        //         'interests-3'   => $itr[3],
        //         'interests-5'   => $itr[5],
        //         'interests-6'   => $itr[6],
        //         'interests-7'   => $itr[7],
        //         'interests-0'   => $itr[0],
        //     ]);
        // }else{
        //     UserInterest::Insert([
        //         'user_id'       => Auth::user()->id,
        //         'interests-1'   => $itr[1],
        //         'interests-2'   => $itr[2],
        //         'interests-3'   => $itr[3],
        //         'interests-5'   => $itr[5],
        //         'interests-6'   => $itr[6],
        //         'interests-7'   => $itr[7],
        //         'interests-0'   => $itr[0],
        //     ]);
        // }


        $request->looking_for = implode(',', $request->looking_for);
        $request->languages_spoken = implode(',', $request->languages_spoken);
        $request->interests = implode(',', $request->interests);
       
        $isExist = UserDetail::select("*")
            ->where("user_id",'=' , Auth::user()->id)
            ->exists();

        if ($isExist) {
            $match1 = UserDetail::where('user_id','=',Auth::user()->id);
            $match = $match1->update([
                'user_id'           => $request->user_id,         //id user (primary key)
                'location'          => $request->location,        //vi tri hien tai
                'looking_for'       => $request->looking_for,     //nhu cau tim kiem(dang tim)
                'gender'            => $request->gender,          //gioi tinh
                'height'            => $request->height,          //chieu cao
                'age'               => $request->age,             //tuoi
                'languages_spoken'  => $request->languages_spoken,//ngon ngu noi
                'company'           => $request->company,         //noi lam viec
                'high_school'       => $request->high_school,     //truong cap 3
                'grad_school'       => $request->grad_school,     //dai hoc
                'education_level'   => $request->education_level, //trinh do hoc van
                'your_kids'         => $request->your_kids,       //con cai
                'smoking'           => $request->smoking,         //hut thuoc
                'drinking'          => $request->drinking,        //uong ruou
                'religion'          => $request->religion,        //ton giao
                'interests'         => $request->interests,       //moi quan tam
            ]);
        }else{
            UserDetail::create([
                'user_id'           => $request->user_id,         //id user (primary key)
                'location'          => $request->location,        //vi tri hien tai
                'looking_for'       => $request->looking_for,     //nhu cau tim kiem(dang tim)
                'gender'            => $request->gender,          //gioi tinh
                'height'            => $request->height,          //chieu cao
                'age'               => $request->age,             //tuoi
                'languages_spoken'  => $request->languages_spoken,//ngon ngu noi
                'company'           => $request->company,         //noi lam viec
                'high_school'       => $request->high_school,     //truong cap 3
                'grad_school'       => $request->grad_school,     //dai hoc
                'education_level'   => $request->education_level, //trinh do hoc van
                'your_kids'         => $request->your_kids,       //con cai
                'smoking'           => $request->smoking,         //hut thuoc
                'drinking'          => $request->drinking,        //uong ruou
                'religion'          => $request->religion,        //ton giao
                'interests'         => $request->interests,       //moi quan tam
            ]);
        }
    }
}