<?php

namespace App\Http\Controllers\Matching;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\MatchUser;
use App\Models\UserInterest;
use App\Models\Interests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userDetail = User::with('detail')->find(Auth::user()->id);       
        if($userDetail->detail==null){
            return view('matching.match_profile_edit_new');
        }else{
            $itr_id = User::with('interestFunction')->find(Auth::user()->id)->interestFunction->pluck('id');
            $user = Interests::with('user')->find($itr_id);
            //dd($user);
            $id = $user->pluck('user')->collapse()->pluck('id')->countBy()->keys()->take(20);
            // dd($id);
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
            $id1 = $id->toArray();
            //$user1 = User::with('detail')->find($id);
            $user = User::with('detail')
                    ->whereIn('id', $id1)
                    ->orderByRaw('FIELD(id, ' . implode(',', $id1) . ')')
                    ->get();
            //dd($test);
            //$match->whereJsonContains('interests', 'interests-1');
            //dd($user);
            
            return view('matching.match',compact('user','id'));
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
        $isExist = UserDetail::select("*")
            ->where("user_id",'=' , Auth::user()->id)
            ->exists();

        if ($isExist) {
            $match = User::with('detail')->find(Auth::user()->id);
            $tmp = explode(',',$match->detail->languages_spoken);
            $match->detail->languages_spoken = $tmp;
            return view('matching.match_profile', compact('match'));
        }else{
            return view('matching.match_profile_edit_new');
        }
        
        //dd($match->detail->languages_spoken);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        if(Auth::check()){
            // $match = Post::find($id);
            $match = User::with('detail')->find(Auth::user()->id);
            // $match = User::with('detail')
            //                 ->where('id','=',Auth::user()->id)
            //                 ->get()
            //                 ->pluck('detail');
            
            //return view('matching.match_profile_edit');
            return view('matching.match_profile_edit', compact('match'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
        
    }

    /**
     * Update the specified resource in storage.
     */
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

        //dd($request->all());
        return redirect()->intended('match-profile')
            ->withSuccess('Edit Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function match_profile_friend(Request $request)
    {
        if(Auth::check()){
            $id = $request -> id;
            //$iduser = Auth::user()->id;
            $isExist = UserDetail::select("*")
                                ->where("user_id",'=' , $id)
                                ->exists();
            
                    if ($isExist) {
                        $match = User::with('detail')->find( $id);
                        $tmp = explode(',',$match->detail->languages_spoken);
                        $match->detail->languages_spoken = $tmp;

                        return view('matching.match_profile_friend', compact('match'));
                    }else{               
                        return 'Nguoi dung khong ton tai!';
                    }
            }
            return redirect("login")->withSuccess('Opps! You do not have access');
    }
    public function add(Request $request)
    {
        //dd($request->id);
        $iduser = Auth::user()->id;
        $id = $request->id;
        $isExist = MatchUser::select("*")
                        ->where([
                            ["user_id", '=', $iduser],
                            ["match_id", '=', $id]
                        ])
                        ->exists();

        if ($isExist||$iduser===$id) {
            echo "da ton tai";
            return $request;
        }else{
            MatchUser::create([
                'user_id'           => $iduser,         //id user 
                'match_id'          => $id,        //id nguoi match
            ]);
            echo "da them";
            return $request;
        }
        // return $request; 
    }
}
