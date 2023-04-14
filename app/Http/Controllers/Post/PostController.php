<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Tbl_relations;
use App\Models\User;
use Illuminate\Support\Collection;
use Goutte\Client;

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
        //dd(Post::max('created_at'));
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
    public function preview()
    {
        $content = request()->content;
        $id = request()->id;
        $content_test="";
        $id_tag1 = Comment::all();
        $id_tag = $id_tag1 -> where('id','=', $id)->pluck('id_tag');
        //json_decode($json_string, true);
        //$id_tag = request()->id_tag;
        
        //$id_tag_test = Comment::find($id)->pluck('id_tag');

        /**Check URL**/
        $urls = preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $content, $match);
        $results = [];
        $results_tag = [];

        if ($urls > 0) {
           //Lay het url
            $url1 = "";  
            $data = array();
            for($i = 0; $i<$urls; $i++){
                $data[$match[0][$i]] =$match[0][$i];
            }
            $data = array_keys($data);
            //$test = json_encode( $data[1]);
            for($i = 0; $i<count($data); $i++){
                $url1 =$data[$i];
                $url2 = substr($url1,0,50)."...";
               
                $content = str_replace($url1, "<a style=color:#385898 href=$url1> $url2 </a>", $content);
            }
            
            //lay url dau tien trong bai viet
            $url = $match[0][0];
            
            //gui request đến website cần lấy thông tin
            $client = new Client();
            try{
                $crawler = $client->request('GET', $url);

                //dam bao url la hop le
                $status_code = $client->getResponse();
                // if ($status_code == 200) {
                    //Lay title, desc, image
                    $title = $crawler->filterXPath('html/head/title')->text(); // Hoac: $crawler->filterXpath('//meta[@name="title"]')->attr('content');  

                    //check xem co the meta title, desc, image... hay khong
                    if ($crawler->filterXpath('//meta[@name="description"]')->count()) {
                        $description = $crawler->filterXpath('//meta[@name="description"]')->attr('content');
                    }

                    if ($crawler->filterXpath('//meta[@name="og:image"]')->count()) {
                        $image = $crawler->filterXpath('//meta[@name="og:image"]')->attr('content');
                    } elseif ($crawler->filterXpath('//meta[@name="twitter:image"]')->count()) {
                        $image = $crawler->filterXpath('//meta[@name="twitter:image"]')->attr('content');
                    } else { //neu khong co thi lay anh bat ky
                        if ($crawler->filter('img')->count()) {
                            $image = $crawler->filter('img')->attr('src');
                        } else {
                            $image = 'no_image';
                        }
                    }

                    $results['title'] = $title;
                    $results['url'] = $url;
                    $results['host'] = parse_url($url)['host'];
                    $results['description'] = isset($description) ? $description : '';
                    $results['image'] = $image;
                    $results['id'] = $id;
                    //$results['content'] =  $content;
                    
                   
                // }
            } catch (Exception $e) {
                // log
            }            
        }

        /**Check tag user **/
        // if($id_tag!=""){
           // $name_tag = User::find($id_tag)->pluck('name')->first();
           // $name_tag_test = User::find($id_tag_test)->pluck('name');
            //$name_tag2 =  $name_tag1 -> where('id','=',$id_tag)->name;
            //$name_tag = json_encode($name_tag1);
            //$name = "@".$name_tag;
           // $url_name= "route('friend.page',".$id_tag.")";
            //$url_name1 = "http://demolrv10.com/friend-page/".$id_tag;
            // $content = str_replace($name, "<a style=color:#385898 href=$url_name1 > $name_tag </a>", $content);
              
        // }else{
        //     $id_tag="rong";
        // }
        $text = json_decode($id_tag,true);
        $name_tag1 = User::all();
        $name_tag = $name_tag1 -> where('id','=', $text[0])->pluck('name')->first();
        $text2 = json_decode($name_tag,true);
        $t = "@".$name_tag;
        $url_name1 = "http://demolrv10.com/friend-page/".$text[0];

        //$content = str_replace($t,"<a style=color:black; font-weight: 900; href=$url_name1><i> $t</i></a>", $content);

        $results_tag['tag_id'] =  $text[0];
        $results_tag['tag_name'] = $content;
        $results_tag['id'] = $id;
       
        //return
        if (count($results,1) > 0) {
            $results['content'] =  $content;
            return response()->json(['success' => true, 'data' => $results,'data_tag'=>$results_tag]);
        }
    
        return response()->json(['success' => false, 'data' =>  $results, 'data_tag'=>$results_tag]);
        // return $content;
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
