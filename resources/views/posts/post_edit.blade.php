
@extends('template1')
   
@section('content')
<font color="#000">
<div class="container" style="margin-left: 10%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body">
                    <form method="post" action="{{ route('posts.update') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label class="label">Post Title: </label>
                            <input type=text name=title class="form-control" value="{{$post->title}}" required/>
                        </div>
                        <div class="form-group">
                            <label class="label">Post Body: </label>
                            <textarea  style="width: 400px;" name=body  id="timymce" class="form-control" >{{$post->body}}</textarea>
                            @if ($errors->has('body'))
                                <span class="text-danger">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                        <div class="form-group" >
                            <label class="label">Post Image: </label>
                            <input id="photo" type="file" class="form-control" name="photo" autocomplete="photo"> 
                            <!-- @if ($errors->has('photo'))
                          
                                <span onload="autoclick()" class="text-danger">{{ $errors->first('photo') }}</span>
                            @endif   -->
                            </br>
                            <img style="float: center;  width: 60%; border-radius: 10px 10px 10px;" src="/upload/photo/{{ $post->photo }}" >        
                        </div>
                         
                        <div class="form-group"> 
                            <label class="label">Status:  &emsp;</label>
                            <select style="float: center;  width: 20%; border-radius: 10px 10px 10px;" name="status" id="status">
                                <option value="public">public</option>
                                <option value="private">private</option>
                            </select>
                        </div>
                        <input id="id" type="hidden" class="form-control" name="id" value = "{{$post->id}}">
                        
                        <div class="form-group">
                            <input onclick="load({{$post->id}})" style="width: 30%; border-radius: 10px 10px 10px;" type=submit class="btn btn-success" value="Edit"/>
                        </div>
                        
                    </form>
            <script language="javascript">
                    //Gửi kết bạn
                    function load($id){  
                     
                        $.ajax({
                                type: "POST",
                                cache: false,
                                url: "{{ route('posts.update') }}",
                                data: {
                                    "_token": '{{csrf_token()}}',
                                 
                                    id: $id,
                                   
                                    
                                },
                                dataType: "text",
                                success: function(data){
                                    console.log(data);
                                    //alert(data);   
                                   // location.reload();   
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
                    // function autoclick() {
                    //     alert('autoclick');
                    // }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection