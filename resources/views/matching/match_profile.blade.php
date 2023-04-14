<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/app.css') }}">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style type="text/css">
        body{
           
            /* background: url(../../image/banner1.jpg)no-repeat; */
            background: url({{ Vite::asset('resources/image/banner1.jpg') }})no-repeat;
            background-attachment: fixed;
                background-position: center;
                background-size: auto;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
            padding:auto;
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            overflow:auto;
            /* background-color: #000000; */
           
            /* background-image: url("F:\WorkSpace\demoLrv10\resources\image\anh1.jpg"); */
        }
        img#image {
            height: 350px;
            width: 100%;
            border-radius:100%;
            -moz-border-radius:5%;
            -webkit-border-radius:5%;
            /* object-fit: circle(50px at 50% 50%);  */
            margin: auto;
        }
        .column{
            height: 50px;
            /* background: #fff; */
        }
        .left-column {
            width: 7%;
            height: 100%;
            /* background: #ddd; */
            float: left;
            margin-left: 2%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-column {
            width: 91%;
            height: 100%;
         
            /* background: #959595; */
            float: right;
            font-size: medium;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
    </style>
    
</head>
@extends('template1')
   
@section('content')
<body>
    <!-- Main -->
    <!-- <font color="#000000"> -->
    <div class="main" style="width: 60%;margin-left: 30%;">
        <h2 style="color:#000"><strong>IDENTITY</strong></h2>
        <div class="card">
            <div class="card-body" style="background: none; margin-left: -12%;">
                <a href="{{ route('match.edit') }}" class="fa fa-pen fa-xs edit"></a>
                        <div>
                            <img id="image" src="/upload/photo/{{ Auth::user()->photo }}">
                        </div>
                        <div>
                            <h3 style="margin-bottom: -4%;"><strong>&nbsp;{{$match->name}}, {{$match->detail->age}}</strong></h3>
                            <small style="font-size: small">&nbsp;&nbsp;&nbsp; {{$match->detail->gender}}</small>
                        </div>
                        <div class="column">
                            <div class="left-column">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hearts" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.931.481c1.627-1.671 5.692 1.254 0 5.015-5.692-3.76-1.626-6.686 0-5.015Zm6.84 1.794c1.084-1.114 3.795.836 0 3.343-3.795-2.507-1.084-4.457 0-3.343ZM7.84 7.642c2.71-2.786 9.486 2.09 0 8.358-9.487-6.268-2.71-11.144 0-8.358Z"/>
                                </svg>
                            </div>
                            <div class="right-column">  
                                Dang tim kieu {{$match->detail->looking_for}}   
                            </div>
                        </div>
                        <div class="column">
                            <div class="left-column">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                            </div>
                            <div class="right-column">  
                                Dang o {{$match->detail->location}}
                            </div>
                        </div>
                        <div class="column">
                            <div class="left-column" style="margin-left: 1%;">
                                <!-- <img src="https://img.icons8.com/external-filled-outline-berkahicon/60/000000/external-Height-health-app-filled-outline-berkahicon.png"/> -->
                                <img src="https://img.icons8.com/external-wanicon-solid-wanicon/60/1A1A1A/external-height-health-checkup-wanicon-solid-wanicon.png"/>
                            </div>
                            <div class="right-column">  
                                {{$match->detail->height}} cm
                            </div>
                        </div>
                        <div class="column">
                            <div class="left-column">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                    <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z"/>
                                </svg>  
                            </div>
                            <div class="right-column">  
                                {{$match->detail->company}}
                            </div>
                        </div>
                        <div class="column">
                            <div class="left-column" style="margin-left: 1%;">
                                <img src="https://img.icons8.com/external-jumpicon-glyph-ayub-irawan/32/1A1A1A/external-cigarette-wayfinding-jumpicon-glyph-jumpicon-glyph-ayub-irawan.png"/>
                            </div>
                            <div class="right-column">  
                                {{$match->detail->smoking}} 
                            </div>
                        </div>
                
            </div>
        </div>
    </div>
    <!-- End -->
</body>
@endsection
</html>