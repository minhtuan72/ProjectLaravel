<!doctype html>
<html lang="en">
  <head>
    <title>Friend</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/style.css') }}">

    <style type="text/css">    
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
  
        body{
           
            /* background: url(../../image/banner1.jpg)no-repeat; */
            background: url({{ Vite::asset('resources/image/banner1.jpg') }})no-repeat;
            background-attachment: fixed;
                background-position: center;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
            padding:0;
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            
            /* background-color: #000000; */
           
            /* background-image: url("F:\WorkSpace\demoLrv10\resources\image\anh1.jpg"); */
        }
        .navbar-laravel
        {
            background-color: rgba(247, 247, 247, 1);
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        
        
        img {
            height: 220px;
            width: 100%;
           
        }
        #btnSubmit{
            width: 100%; 
            text-align: center;
            padding: 4px;
            border: none;
            background-color: DodgerBlue;
            cursor: pointer;
            display: inline-block;
            
        }
        #left, #right{ 
            width: 49%; 
            text-align: center;
            padding: 4px;
            border: none;
            background-color: DodgerBlue;
            cursor: pointer;
            /* display: inline-block;
            padding: 8px;
            color: white;
            background-color: DodgerBlue;
            text-align: center;
            cursor: pointer;
            position: absolute;
            bottom: 0;  */
        } 
        #left  { float:left;  }
        #right { float:right; } 
    </style>
</head>
@extends('template1')
   
@section('content')

  <body>
    <div class="main">
        <div class="row">
        <font color="#000000">
        @foreach($fen1 as $row)  
                                    @php   
                                       $check = 'false';  
                                    @endphp
                                    @foreach($ch1 as $row1) 
                                        @if(($row1->user_nhan_id)==($row->id))
                                        
                                            @php   
                                                $check = 'true';
                                            @endphp
                                            
                                            @break 
                                        @elseif(($row1->user_send_id)==($row->id))  
                                            @php   
                                                $check = 'true';
                                            @endphp
                                            @break 
                                        @endif
                                    @endforeach
                              
                @if($check=='true')
          
               <div class="column">
                  <div class="card">
                    <img src="/upload/photo/{{ $row->photo }}" >
                        <div class="container">
                            <h2 class="name">{{$row->name}}</h2>
                            
                            <div id="result">
                               
                           
                            </div>
                           
                            <p class="title">Job: {{$row->job}}</p>
                            <p>Desc: {!! $row->description !!}</p>
                            <p id="email">Email: {{$row->email}}</p>
                            <input id="id" type="hidden" class="form-control" name="id" value = "{{$row->id}}">
                            <p><br></p>
                        </div>
                            <p><button type="submit" class="button" onclick="dele({{$row->id}})">Unfriend</button></p>
                       
                </div>
               </div>
               @endif
          
        @endforeach
            <script language="javascript">
                    //Gửi kết bạn
                    function load($id){    
                        $.ajax({
                            type: "POST",
                            cache: false,
                            url: "{{ route('friend.apply') }}",
                            data: {
                                "_token": '{{csrf_token()}}',
                                id: $id, 
                            },
                            dataType: "text",
                            success: function(data){
                                console.log(data);
                                alert('Da gui loi moi'); 
                                location.reload();  
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

                    //Xóa kết bạn, lời mời kết bạn
                    function dele($id){
                        var result = confirm("Bạn có muốn hủy?");
                        if (result == true) {
                            $.ajax({
                                type: "POST",
                                cache: false,
                                url: "{{ route('friend.dele') }}",
                                data: {
                                    "_token": '{{csrf_token()}}',
                                 
                                    id: $id,
                                    
                                },
                                dataType: "text",
                                success: function(data){
                                    console.log(data);
                                    alert('Huy thanh cong');   
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

                    //Đồng ý kết bạn
                    function add($id){
                        var result = confirm("Bạn có muốn đồng ý?");
                        if (result == true) {
                            $.ajax({
                                type: "POST",
                                cache: false,
                                url: "{{ route('friend.add') }}",
                                data: {
                                    "_token": '{{csrf_token()}}',
                                   
                                    id: $id,
                                },
                                dataType: "text",
                                success: function(data){
                                    console.log(data);
                                    alert('Đồng ý');   
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
                            console.log("Hủy thao tác");
                        }    
                        
                    }
                </script>
                        
        </div>
    </div>
    @endsection
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>