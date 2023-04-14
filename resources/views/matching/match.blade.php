@extends('template')
   
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!-- <h3 class="text-center text-success"  style="background-color: #fff;">{{Auth()->user()->name}}</h3> -->
        <div style="width: 100%; background-color:##1c2e42; border: 2px outset #eae1e4;  border-radius: 10px 10px 10px; margin-top: 9%;">
            <a style="width: 50%; margin: auto;" name="" id="" class="btn btn-secondary" href="{{ route('match.profile') }}" role="button">Profile</a>
            <a style="width: 49%; float: right;" name="" id="" class="btn btn-secondary" href="{{ route('posts.create') }}" role="button">Ideal Match</a>
        </div>
        <!-- {{$id}} -->
        @foreach($user as $m)
            <div class="card" id="card_{{$m->id}}" style="display:block">
                <div style="background-color:#fff; border: 2px outset #eae1e4;  border-radius: 10px 10px 10px;">
                <div class="group">
                    <a  href="{{ route('match.profile_friend', $m->id) }}">
                        <img style="  border-radius:100%;
                                        -moz-border-radius:5%;
                                        -webkit-border-radius:5%;  
                                        width: 100%; boder:1px solid red; height:350px; "
                                src="/upload/photo/{{ $m->photo }}">
                    </a>
                </div>
                <div>
                    <!-- {{$m->id}} -->
                    <h3 style="margin-bottom: 0;"><strong>&nbsp;{{$m->name}}, {{$m->detail->age}}</strong></h3>
                    
                    <div style="font-size: small ">&nbsp;&nbsp;&nbsp; {{$m->detail->gender}}</div>
                    
                    <div style="font-size: larger; margin-left:3%"><small >{!!$m->description!!}</small></div>
                </div>
                <div class="row">
                    <div style="margin-top: 1%;" class="col-1">
                        
                    </div>
                    <div class="col-9">
                        <h3 style="margin-left:3%; margin-top: 2%; text-align: left; "> </h3>
                    </div>
                </div>
                    <hr id="t" name="t" style="margin-top: 0rem;
                        margin-bottom: 1rem;
                        
                        border-top: 2px solid rgba(0,0,0,.1);"/>
                    <div>
                        <h4 style="text-align: center; "> </h4>
                    </div>

                    <div style="margin:auto;  width: 90%;" >
                        <!-- <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                            </svg>
                        </div>
                        &ensp;
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                        </div>
                        &ensp;
                        <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                        </svg>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                            </svg>
                        </div> -->
                        <center>
                        
                        
                            <button onclick="dele({{$m->id}})" class="codepro-custom-btn codepro-btn-17" target="blank" title="Code Pro"><span>Delete</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                    </svg>
                                </span>
                            </button>
                            
                            
                            <button id="btn_{{$m->id}}"  onclick="hide({{$m->id}})"  class="codepro-custom-btn codepro-btn-12" target="blank" title="Code Pro" >
                                <span>Match</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-heart-half" viewBox="0 0 16 16">
                                        <path d="M8 2.748v11.047c3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </span>
                            </button>
                            
                        </center>
                    </div>
                 
                        
                    <!-- <div style="margin: auto;  width: 95%;" >
                      
                    </div> -->
                
                   
                    
                    </br>
                   
                </div> 
           
            </div>
        @endforeach
            <br/>
        </div>
        <script type="text/javascript">
            function dele($id){
                console.log("nhay vao delete");
                $test = 'card_'+$id;
                var x = document.getElementById($test);
                if (x.style.display === 'none') {
                    x.style.display = 'block';        
                } else {
                    x.style.display = 'none';
                }
            }
            function hide($id){
                console.log("nhay vao delete");
                $test = 'btn_'+$id;
                var x = document.getElementById($test);
                x.style.display = 'none';
                $.ajax({
                            type: "POST",
                            cache: false,
                            url: "{{ route('match.add') }}",
                            data: {
                                "_token": '{{csrf_token()}}',
                                id: $id, 
                            },
                            dataType: "text",
                            success: function(data){
                                console.log(data);
                                // alert('Da gui loi moi'); 
                                // location.reload();  
                                // toastr.success('Create successfully !');        
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
            }
        </script>
    </div>
</div>
@endsection