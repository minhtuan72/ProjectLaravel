<font color="#000">
@foreach($comments as $comment)
   
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        @if($comment->user->id === Auth::user()->id)
            <strong>  <a href="{{ route('profile')}}"> <img style="margin: auto; float: center;  width: 25px; border-radius: 10px 10px 10px;" src="/upload/photo/{{ $comment->user->photo }}" > {{ $comment->user->name }} </a></strong>
        @else 
            <strong>  <a href="{{ route('friend.page', $comment->user->id) }}"> <img style="margin: auto; float: center;  width: 25px; border-radius: 10px 10px 10px;" src="/upload/photo/{{ $comment->user->photo }}" > {{ $comment->user->name }} </a></strong>
        @endif
        <div  id="cmt_{{ $comment->id }}">{!! $comment->body !!}</div>
        <div id="pre_{{ $comment->id }}" style="display:none; width:100%;  height:150px;  overflow-x:hidden;   overflow-y:hidden; border-radius: 10px 10px 10px; border: 2px solid rgb(176 199 223 / 25%);"></div>
        <!-- test -->
        <p style="display:none" name="id_cmt">{{$comment->id}}</p>
        <!-- endtest -->
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type=text name=body class="form-control" />
                <input type=hidden name=post_id value="{{ $post_id }}" />
                <input type=hidden name=parent_id value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type=submit class="btn btn-warning" value="Reply" />
            </div>
        </form>
      
        @include('posts.commentsDisplay', ['comments' => $comment->replies])
         <!-- <script type="text/javascript">
                   function preCmt($id){
                        console.log('nhay vao 1');
                        $test = 'cmt_'+$id;
                        $pre = 'preView_'+$id;
                        var content = document.getElementById($test).value;
                        if(content!=""){
                            $.ajax({
                                type: "GET",
                            
                                url: "{{ route('posts.preview') }}",
                                data: {
                                    "_token": '{{csrf_token()}}',
                                    content: content,
                                    id: $id,
                                },
                                dataType: "json",
                                success: function (response) {
                                    console.log(response);
                                    document.getElementById($pre).style.display = 'block';
                                    if (response.success) {
                                        var data = response.data;
                                        var preview = '<div id="id_preview" class="row" style="">'
                                                        + '<div class="col-md-3" style="background: #999;">'
                                                           
                                                                + '<img src="' + data.image + '" width="150" height="150">'
                                                           
                                                        + '</div>'
                                                        + '<div class="col-md-9" style="background: #f8f9fa;">'
                                                            + '<div class=" url-title">'
                                                                + '<a href="' + data.url + '">' + data.title + '</a>'
                                                            + '</div>'
                                                            + '<div class=" url-link">'
                                                                + '<a href="' + data.url + '">' + data.host + '</a>'
                                                            + '</div>'
                                                            + '<div class=" url-description">' + data.description + '</div>'
                                                        + '</div>'
                                                    + '</div>';

                                        $('#id_preview').remove();
                                        $('#'+$pre).append(preview);
                                        //document.getElementById($pre).innerHTML = "hello";
                                    }
                                    else{
                                        document.getElementById($pre).style.display = 'none';
                                        $('#id_preview').remove();
                                    }
                                },
                                error: function(response){       
                                    alert('that bai!');
                                    console.log(response);
                                    // alert(data);
                                },
                                complete: function(data){
                                    console.log(data);
                                    console.log("nhay vao");
                                }
                            });
                        } else if (content===""){
                            document.getElementById($pre).style.display = 'none';
                            $('#id_preview').remove();
                            console.log("nhay vao pre null");
                        }
                       
                    }
            </script> -->
    </div>
@endforeach
