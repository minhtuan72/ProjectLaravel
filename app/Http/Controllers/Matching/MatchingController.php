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
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Services\MatchingService;

class MatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private MatchingService $matchingService)
    {
    }
    public function index()
    {
        if(Auth::check()){
            $user = $this->matchingService->match();
            return Inertia::render('Matching/Match', [
                'user' => $user
            ]);
                // return view('matching.match',compact('user','id','id1'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $match = $this->matchingService->show();
        if ($match != '-1') {
            return Inertia::render('Matching/MatchProfile', [
                'match' => $match
            ]);
        }else{
            return view('matching.match_profile_edit_new');
        }
    }

    public function edit()
    {
        if(Auth::check()){
            $match = $this->matchingService->edit();
            
            return Inertia::render('Matching/MatchProfileEdit',[
                'match' => $match
            ]);   
        }
        return redirect("login")->withSuccess('Opps! You do not have access');   
    }

    public function update(Request $request)
    {
        $iduser = Auth::user()->id;
        $this->matchingService->update($request, $iduser);
        //dd($request->all());
        return redirect()->intended('match-profile')
            ->withSuccess('Edit Success!');
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

                        return Inertia::render('Matching/MatchProfileFriend', [
                            'match' => $match
                        ]);
                        // return view('matching.match_profile_friend', compact('match'));
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
