@extends('template')
   
@section('content')
<div class="container" style="width:100%;  position: absolute;">
    <div class="row justify-content-center" style="margin-right: 4%; margin-left:3%; margin-top: 7%;"> 

        @foreach($post5 as $p)
            @foreach($p as $post)
            @php
                $key = $post->id_user;
                $ch = "N";
                $pr = $post->status;
            @endphp
           
            @if($pr == "public"&& $key!= Auth::user()->id)
            <div class="card" style="background: rgb(239 242 245);">
                <div style="background-color:#fff; border-style: outset;  border-radius: 10px 10px 10px;">
                <div class="group" style="bx--col-sm-2">
                    <div class="btn-group" style="float: right; margin-right:3%; margin-top: 2%;"  >
                    
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
                        <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{ route('post') }}">List</a>
                            <a class="dropdown-item" href="{{ route('posts.post_edit', $post->id) }}">Edit</a>
                            <a class="dropdown-item" onclick="dele({{$post->id}})">Delete</a>
                        </div> -->
                       
                    </div>
                    
                </div>
                    @php
                        $user = App\Models\User::where('id', '=', $key)->first();
                    @endphp
                <div class="row" >
                    <div style="margin-top: 1%;" class="col-1">
                        <img style="  border-radius:100%;
                                    -moz-border-radius:50%;
                                    -webkit-border-radius:50%;
                                    object-fit: circle(50px at 50% 50%);  
                                    width: 40px; boder:1px solid red; height:40px; "
                             src="/upload/photo/{{ $user->photo }}">
                    </div>
                    
                 
                    <div class="col-9">
                        <h3 style="margin-left:3%; margin-top: 2%; text-align: left; ">{{ $user->name }} </h3>
                    </div>
                </div>
                    <hr id="t" name="t" style="margin-top: 0rem;
                        margin-bottom: 1rem;
                        
                        border-top: 2px solid rgba(0,0,0,.1);"/>
                    <div>
                        <h4 style="text-align: center; ">{{ $post->title }} </h4>
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
                    <!-- Image post -->
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
                
                <div class="card-body" style="background-color: #fff; border-radius: 20px 20px 20px;">
                
                    <div style="margin: auto;  width: 100%; background-color: #fff;  padding: 10px;">
                        <hr style="margin: auto;  width: 100%; "/>
                            <h5 style="text-align: center; color:#000">Comments</h5>
                        <hr style="margin: auto;  width: 100%;"/>
                            <form method="post" action="{{ route('comments.store'   ) }}">
                                @csrf
                                <div id="div_form" class="form-group"  style="float: center; width: 100%;">
                                    <input type=text id="myInput_{{ $post->id }}" onfocus="test({{ $post->id }}); preView({{ $post->id }});" name=body class="form-control" data-container="body" data-toggle="popover" value ="">
                                    <input type=hidden id="myInput1_{{ $post->id }}" class="form-control"  data-container="body" data-toggle="popover" value ="" >
                                    <div id="result_{{ $post->id }}" style="width:200px;  height:150px;  overflow-x:hidden;   overflow-y:auto; border-radius: 10px 10px 10px; display:none;">
                                   
                                    </div>
                                    <div id="preView_{{ $post->id }}" style="display:none; width:100%;  height:150px;  overflow-x:hidden;   overflow-y:hidden; border-radius: 10px 10px 10px; border: 2px solid rgb(176 199 223 / 25%);">
                                    </div>  
                                    <input type=hidden name=post_id value="{{ $post->id }}" />
                                    <input  type=hidden name=id_tag id="iduserInput_{{ $post->id }}" value="" />
                                    <input type=submit class="btn btn-success" value="Send" />
                                </div>
                            </form>
                            <!-- Test -->
                                <!-- <p id="p">Example: <i>italic</i> and <b>bold</b></p>
                                From <input id="start" type="number" value=1> – To <input id="end" type="number" value=4>
                                <button id="button">Click to select</button> -->
                                <!-- <p id="info1">Nơi hiện thị thông tin</p> -->
                                <!-- <button onclick="test_cmt()">Test</button> -->
                                <!-- <input id="pop" oninput="test()"  type="text" class="form-control" data-container="body" data-toggle="popover1"  >
                                 
                                <div id="result_{{ $post->id }}" style="width:200px;  height:150px;  overflow-x:hidden;   overflow-y:auto; border-radius: 10px 10px 10px; display:none;">
                                   
                                </div>
                                <div id="result" style="width:200px;  height:150px;  overflow-x:hidden;   overflow-y:auto; border-radius: 10px 10px 10px; display:none;">
                                   <h2>Test</h2>
                                </div> -->
                                <!-- <div id="test">
                                    <div id="foo" jsaction="leftNav.clickAction;mouseover:leftNav.dichuot">
                                        some content here
                                    </div>
                                </div> -->
                            <!-- End Test -->

                            <text  onclick="myFunction({{$tmp}})" style="color: #007bff; font-style: italic;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                            </svg>view comment</text>  
                            </br>
                           
                            <div id="myDiv/{{$post->id}}" style="margin: auto;  width: 95%; display: none">
                            
                        @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                        </div> 
                        
                    </div>

                </div>
           
          
                
            <br/>
            
            @endif
            @endforeach
            @endforeach
        </div>
        
        <script type="text/javascript">
               
                    //Xem preview o cmt
                    function preCmt($id){
                      
                        $test = 'cmt_'+$id;
                        $pre = 'pre_'+$id;
                        var content = document.getElementById($test).innerHTML; //lay comment
                        //console.log($id+": "+content);
                     
                        if(content!=""){
         
                            $.ajax({
                                type: "GET",
                            
                                url: "{{ route('posts.preview') }}",
                                data: {
                                    "_token": '{{csrf_token()}}',
                                    content: content,
                                    id: $id
                                },
                                dataType: "json",
                                success: function (response) {
                                    //console.log("response: "+response);
                                    // document.getElementById($pre).style.display = 'block';
                                    var idtag = response.data_tag;
                                    $id_cmt1 = 'cmt_' + idtag.id;
                                    //console.log("_idtag: "+idtag.tag_id + "_nametag: "+idtag.tag_name);
                                    document.getElementById($id_cmt1).innerHTML = idtag.tag_name;
                                    if (response.success) {
                                        var data = response.data;
                                        
                                        //console.log("data: "+data);
                                        var preview = '<div id="id_preview_cmt" class="row" style="">'
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
                                        // console.log("id_tag: "+data.id_tag);

                                        $id_cmt_pre = 'pre_' + data.id;
                                        $id_cmt = 'cmt_' + data.id;
                                        //console.log("vi tri: "+$id_cmt_pre);

                                        // $('#id_preview').remove();
                                        $('#'+$id_cmt_pre).append(preview);
                                        // $('#'+$id_cmt).append(preview); 

                                        document.getElementById($id_cmt).innerHTML = data.content;
                                        document.getElementById($id_cmt_pre).style.display = 'block';
                                        //console.log("id cmt: "+$test);
                                        //document.getElementById($pre).innerHTML = preview;
                                    }
                                    else{
                                        // document.getElementById($pre).style.display = 'none';
                                        // $('#id_preview').remove();
                                    }
                                },
                                error: function(response){       
                                    alert('that bai preCmt!');
                                    //console.log(response);
                                    // alert(data);
                                },
                                complete: function(data){
                                    //console.log(data);
                                    //console.log("nhay vao");
                                }
                            });
                        } else if (content===""){
                            //document.getElementById($pre).style.display = 'none';
                            // $('#id_preview').remove();
                            //console.log("nhay vao pre null");
                        } 
                    }

                    //Xem preview o input
                    function preView($id){
                        $test = 'myInput_'+$id;
                        $pre = 'preView_'+$id;
                        var content = document.getElementById($test).value;
                        document.getElementById($pre).style.display = 'none';
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
                                    //console.log(response);
                                   
                                    if (response.success) {
                                        document.getElementById($pre).style.display = 'block';
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
                                    //console.log(response);
                                    // alert(data);
                                },
                                complete: function(data){
                                    //console.log(data);
                                    //console.log("nhay vao");
                                }
                            });
                        } else if (content===""){
                            document.getElementById($pre).style.display = 'none';
                            $('#id_preview').remove();
                            //console.log("nhay vao pre null");
                        } 
                    }

                    //mentions @
                    
                       //$('#myInput1_'+$id).val(x);
                        //var x =  tinymce.get($test).getContent({format: 'text'});
                    // console.log(document.getElementById('myInput_25').value);
                    // var courses, id_user;
                    function myTest($id) {
                        $test = 'myInput_'+$id; //id input
                        $res = 'result_'+$id;   //id the div hien thi
                        $test2 = '#myInput_'+$id;
                        //var x = document.getElementById($test).value;
                       //$('#myInput1_'+$id).val(x);
                        var x =  tinymce.get($test).getContent({format: 'text'});
                        console.log(x);
                        
                        // var myRe = /[adi]/m;
                        // var myArray = myRe.exec(x);
                        // console.log("ra: "+myArray);
                        // const regex = new RegExp('(\n*@)');
                        // var reg = regex.test(x);
                        // console.log(reg);
                        // var la = '\n@';
                        // console.log("last: "+la.lastIndexOf(x));
                        //var str = JSON.stringify(reg);
                        //var ck =0;
                        //var test = 1;
                        // while(test!=ck){
                        //     ck = x.search("@", ck);
                        //     console.log(ck); // true
                        //     test = ck;
                        // }
                        
                        var s = -2;
                        s = x.lastIndexOf(" ");
                        //console.log("vi tri '\n': "+s);
                        var cut_str = x.substring(s+1);
                        console.log("new str: "+cut_str);

                        var position = cut_str.indexOf("@");
                        var ch = cut_str.charAt(position); 
                        

                        if (ch === '@') {
                            //alert("vao @");
                            //console.log("nhay vao2");
                            document.getElementById($res).style.display = 'block';
                            $.ajax({
                                type: "POST",
                                cache: false,
                                url: "{{ route('friend.mentions') }}",
                                data: {
                                    "_token": '{{csrf_token()}}',
                                 
                                    id: $id,
                                    
                                },
                                dataType: "json",
                                success: function(data){
                                    var str = JSON.stringify(data);
                                    
                                    //lay ten, id ban be cua ng cmt vao 2 mang
                                    courses = new Array(data.length);
                                    id_user = new Array(data.length); 
                                    for(let i =0; i<data.length; i++){
                                        courses[i] = data[i][0].name;
                                        id_user[i] = data[i][0].id;
                                    }

                                    var filter = cut_str.toUpperCase();
                                    //var testHtml = "<ul class='"+"nav flex-column nav-pills'" + "role="+"'tablist'" +  "aria-orientation="+"'vertical'"+">";
                                    var test1 = "";
                                    //var txtValue = "@";
                                    //var taga = "<a href="+"'#profile'" +"aria-controls="+"'profile'" +" role="+"'tab'"+ "data-toggle="+"'tab'"+">";
                                    var tagdiv = '<div class="list-group">';
                                    //var taga2 = "<a href="+"'#' " + "class="+"'list-group-item list-group-item-action'"+">";
                                   // var tago = "<option value="+"'Merceders'"+">";
                                    var taga3 = '<a onclick="displayVals(';
                                    var taga4 =')" class="list-group-item list-group-item-action">';

                                    //var tagsel = '<select id="multiple" multiple="multiple">';
                                    //var tago1 = ' <option >';
                                    //var tago2 = ' <option  style="display:none">';

                                    for(let i =0; i<courses.length; i++){
                                        txtValue = ' @' + courses[i];

                                        //const tt = new RegExp(/\W/.filter);
                                        
                                        //console.log('@' + courses[i] + ": "+filter );
                                        //console.log(txtValue.toUpperCase()+"- "+filter+": "+txtValue.toUpperCase().search(filter));
                                        //console.log(tt.test(txtValue.toUpperCase())+" he");
                                        if(txtValue.toUpperCase().indexOf(filter)>-1){
                                        //if(tt.test(txtValue.toUpperCase())){
                                            test1 = test1+"<li role="+"'presentation'"+" style"+"="+"display:"+"block;"+">" +taga3 + i +','+ $id+ taga4+courses[i]+"</a>"+"</li>";
                                            // test1 = test1 + tago1 + courses[i] + '</option>';
                                        }
                                        else{
                                             test1 = test1+"<li"+" style"+"="+"display:"+"none;"+" >"+courses[i]+"</li>";
                                            // test1 = test1 + tago2 + courses[i] + '</option>';
                                        }  
                                    }
                                    var en = tagdiv + test1 + "</div>";
                                    // var en = tagsel + test1 + "</select>";

                                    document.getElementById($res).innerHTML = en;
                                    console.log( courses)

                                    //test
                                    // $('[data-toggle="popover"]').popover(
                                    // {
             
                                    //     placement: 'auto',
                                    //     content:  document.getElementById($res).innerHTML,
                                    //     html: true
                                    // }
                                    //     );
                                    // $($test2).popover('show');
                                    
                                // alert('thanh cong!');
                                    // $("#multiple" ).change(displayVals);
                                    // displayVals();
                                },
                                error: function(data){       
                                    alert('that bai!');
                                    // alert(data);
                                },
                                complete: function(){
                                   // console.log("nhay vao");
                                }
                            }); 
                        } else if (x===""){
                            document.getElementById($res).style.display = 'none';
                            // document.getElementById($test).style.display = 'none';
                            // $($test2).popover('hide');
                           // console.log("nhay vao1")
                        }
                    }

                    //an hien muc cmt
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

                    //Hien thi preview ra cmt
                    function show_pre_cmt(){
                        
                        const id = document.getElementsByName('id_cmt');//lay mang id cua cmt hien thi
                        for(let i =0; i<id.length; i++){
                            //console.log("id cua cmt: "+id[i].innerHTML);
                            preCmt(id[i].innerHTML);
                        } 
                    }
                    window.onload = show_pre_cmt;

                    //Chon @name va dua vao o input
                    function displayVals($id_i, $id_input) {
                        
                        var regex = /@\w*/ig;
                        //console.log("reg: "+x.match(regex));
                        //x = document.getElementById('myInput_'+$id_input).value;
                        //x1 = document.getElementById('myInput_'+$id_input).value;
                        x =  tinymce.get('myInput_'+$id_input).getContent({format: 'html'});
                        x1 =  tinymce.get('myInput_'+$id_input).getContent({format: 'html'});
                        var array = x.match(regex);
                        var tempurl = "/friend-page/"+id_user[$id_i];
                        var temp = courses[$id_i].link(tempurl);
                        for(let i =0; i<array.length; i++){
                            x = x.replace(array[i], '<span><strong style ="color: black;text-decoration: none;">'+temp+'</strong></span><span>'+"&nbsp;"+'</span>');
                            x1 = x1.replace(array[i],"<p>"+courses[$id_i]+"</p>");
                        }
                        console.log("dis: "+x);
                        tinymce.get("myInput_"+$id_input).setContent(x);
                        //$('#myInput_'+$id_input).val(x);
                        //document.getElementById('myInput_'+$id_input).innerHTML =x1;
                        //$('#myInput_'+$id_input).val(document.getElementById('myInput_'+$id_input).value+courses[$id_i]+"' ");
                        //$('#myInput_'+$id_input).append("<p>"+courses[$id_i]+"</p>"+"and");
                        //$('#myInput1_'+$id_input).val('<a hefr="http://demolrv10.com/friend-page/'+id_user[$id_i]+'">'+courses[$id_i]+'</a>');
                        console.log(document.getElementById('myInput_'+$id_input).innerHTML);
                        //$('#myInput1_'+$id_input).val('id_'+id_user[$id_i]+document.getElementById('myInput_'+$id_input).innerHTML);
                        $('#myInput1_'+$id_input).val(x1);
                        
                        let str = document.getElementById('myInput_'+$id_input).innerHTML;
                        let arr = [];
                        arr = str.split('and')
                        //console.log("dis: "+arr);
                        for(let i = 0; i<arr.length ; i++){
                            console.log(arr[i]);
                        }
                        //$('#iduserInput_'+$id_input).val(id_user[$id_i]);
                        //console.log(courses[$id_i]+" - "+$id_input + " iduser: "+id_user[$id_i]);
                        document.getElementById($res).style.display = 'none';
                        //tinymce.get("myInput_25").setContent('<p><span><input type=hidden value="5" /><a hefr="http://demolrv10.com/friend-page/1">'+"@"+courses[$id_i]+'</a></span></p>');

                        
                       
                        // var multipleValues = $("#multiple").val() || [];
                        // document.getElementById('myInput_24').innerText = multipleValues;
                        // $( "#myInput_24" ).text(
                        //     value=multipleValues.join( ", " ) );
                    }

                    //Bắt sự kiện thi thay đổi giá trị
                    
                    //bat su kien nhap vao tinymce
                    function test($id){
                        //console.log("vao test()!");
                       $id_input = '#myInput_'+$id;
                        tinymce.init({
                            selector:  $id_input,
                            //editor_selector : "form-control"  
                            // plugins: "autoresize bold italic bullist emoticons image example help",
                            toolbar: false,
                            menubar: false,
                            skin: "naked",
                            icons: 'small',
                            // plugins: "autoresize",
                            autoresize_bottom_margin: 200,
                            max_height: 200,
                            height: 70,
                            width: 600,
                            //valid_children : "+body[style]",
                            content_css : "../css/style.css",
                            placeholder: "Enter message . . .",
                    
                            setup: function test(editor) {
                                editor.on('input', function(e) {
                                    console.log('Vào!');
                                    //tinymce.activeEditor.hide(); 
                                    console.log(e);
                                //if(e.key=='@'){
                                    myTest($id);
                                //} 
                                preView($id);               
                                });
                            }
                        });
       
                       
                    }
                    //test();
            </script>
    </div>
</div>
@endsection