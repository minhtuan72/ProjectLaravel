@extends('template')
   
@section('content')

<font color="#000">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!-- <h3 class="text-center text-success"  style="background-color: #fff;">{{Auth()->user()->name}}</h3> -->
        <div style="width: 100%; background-color:##1c2e42; border-style: outset;  border-radius: 10px 10px 10px; margin-top: 9%;">
            <a style="width: 50%; margin: auto;" name="" id="" class="btn btn-secondary" href="{{ route('post') }}" role="button">List post</a>
            <a style="width: 49%; float: right;" name="" id="" class="btn btn-secondary" href="{{ route('posts.create') }}" role="button">Create post</a>
        </div>
            
        
        @foreach($post as $post)
        
            <div class="card" >
                <div style="background-color:#fff; border-style: outset;  border-radius: 10px 10px 10px;">
                <div class="group">
                    <div class="btn-group" style="float: right; margin-right:3%; margin-top: 5%;"  >
                    
                        @if( $post->status =="public")
                            <div style="float: right;  width: 100%;" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                </svg>
                                &nbsp;
                            </div>
                        @elseif($post->status =="private")
                            <div style="float: right;  width: 100%;" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                </svg>
                            </div>
                        @endif
                        <svg type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                        </svg>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{ route('post') }}">List</a>
                            <a class="dropdown-item" href="{{ route('posts.post_edit', $post->id) }}">Edit</a>
                            <a class="dropdown-item" onclick="dele({{$post->id}})">Delete</a>
                        </div>
                       
                    </div>
                    
                </div>
                <div class="row">
                    <div style="margin-top: 1%;" class="col-1">
                        <img style="  border-radius:100%;
                                    -moz-border-radius:50%;
                                    -webkit-border-radius:50%;
                                    object-fit: circle(50px at 50% 50%);  
                                    width: 40px; boder:1px solid red; height:40px; "
                             src="/upload/photo/{{ Auth::user()->photo }}">
                    </div>
                    <div class="col-9">
                        <h3 style="margin-left:3%; margin-top: 2%; text-align: left; ">{{ Auth::user()->name }} </h3>
                    </div>
                </div>
                    <hr id="t" name="t" style="margin-top: 0rem;
                        margin-bottom: 1rem;
                        
                        border-top: 2px solid rgba(0,0,0,.1);"/>
                    <div>
                        <h4 style="text-align: center; ">{{ $post->title }} </h4>
                    </div>

                    <div style="margin: auto;  width: 95%;" >
                        {{ $post->status}}
                    </div>
                 
                    
                    <div style="margin: auto;  width: 95%;" >
                        {!! $post->body !!}
                    </div>
                    </br>
                    @php
                   
                        $path = $post->photo;
                        $path1 = '/upload/photo/'.$path;
                        $check = file_exists($path1);
                        $check1 = empty($path) ;
                    @endphp
                    @if(!empty($path))
                    <div style="margin: auto;  width: 95%; "  >
                        <img style="margin: auto; float: center;  width: 100%; border-radius: 10px 10px 10px;" src="/upload/photo/{{$post->photo}}" >
                    </div>
                    @endif
                    
                    </br>
                   
                </div> 
                @php
                    $tmp = $post->id;
                @endphp
                
                <div class="card-body" style="background-color: #c8d6e6; border-radius: 20px 20px 20px;">
                
                    <div style="margin: auto;  width: 100%; background-color: #fff;  padding: 10px;">
                        <hr style="margin: auto;  width: 100%; "/>
                            <h5 style="text-align: center; color:#000">Comments</h5>
                        <hr style="margin: auto;  width: 100%;"/>
                            <form method="post" action="{{ route('comments.store'   ) }}">
                                @csrf
                                <div class="form-group"  style="float: center; width: 100%;">
                                    <input type=text class="form-control" name=body></input>
                                    <input type=hidden name=post_id value="{{ $post->id }}" />
                                    <input type=submit class="btn btn-success" value="Send" />
                                </div>
                                <div class="form-group">
                                    
                                </div>
                            </form>
                            <text  onclick="myFunction({{$tmp}})" style="color: #007bff; font-style: italic;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                            </svg>view comment</text>  
                            </br>
                           
                            <div id="myDiv/{{$post->id}}" style="margin: auto;  width: 95%; display: none">
                        @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                        </div> 
                        
                    </div>

                </div>
           
            </div>
                
            <br/>
            <script type="text/javascript">
                    function myFunction($id) {
                        $test = 'myDiv/'+$id;
                        var x = document.getElementById($test);
                        console.log($test);
                        if (x.style.display === 'none') {
                            x.style.display = 'block';
                           
                        } else {
                            x.style.display = 'none';
                        }
                    }
                    function dele($id) {
                        var result = confirm("Bạn có muốn xoa?");
                        if (result == true) {
                            $.ajax({
                                type: "POST",
                                cache: false,
                                url: "{{ route('posts.dele') }}",
                                data: {
                                    "_token": '{{csrf_token()}}',
                                 
                                    id: $id,
                                    
                                },
                                dataType: "text",
                                success: function(data){
                                    console.log(data);
                                    alert('Xoa thanh cong');   
                                    location.reload();   
                                    $('#result').html(data);
                                // alert('thanh cong!');
                                },
                                error: function(data){
                                    
                                    alert('that bai!');
                                    // alert(data);
                                },
                                complete: function(){
                                    console.log("nhay vao");
                                }
                            });
                        } else {
                            console.log("khong huy");
                        }    
                    }
            </script>
            @endforeach
        </div>
        
    </div>
</div>
@endsection