
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Priend Page</title>

    <!-- Custom Css -->
    <!-- <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/app.css') }}"> -->

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
        }

        /* Main */
        .main{
            margin-top: 2%;
            margin-left: auto;
            margin-right: auto;
            font-size: 28px;
            padding: 0 10px;
            width: 100%;
            overflow: auto;
        }

        .main h2 {
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .main .card {
            background-color: #e8f5ff;
            border-radius: 18px;
            box-shadow: 1px 1px 8px 0 grey;
            height: auto;
            margin-bottom: 20px;
            padding: 20px 0 20px 50px;
            overflow: auto;
        }

        .main .cardtable {
            background-color: #e8f5ff;
            border: none;
            font-size: 16px;
            height: 270px;
            width: 80%;
            overflow: auto;
        }
        .main .card table tbody {
            background-color: #e8f5ff;
            border: none;
            font-size: 14px;
            height: 270px;
            margin-bottom: 20px;
            width: 80%;
        }

        .main .form-group {
            margin-left: 0;
            margin-right: 0;
        }
        .edit {
            position: absolute;
            color: #e7e7e8;
            right: 14%;
        }

        img {
            height: 250px;
            width: 250px;
            border-radius:100%;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            object-fit: circle(50px at 50% 50%); 
            margin: auto;
        }
        
    </style>
    
</head>
@extends('template1')
   
@section('content')
<body >

    <font color="#000000">
    <div id="test" style="float: center;">
    <div  class="main" >
        <h2>{{$sh->name}}</h2>
        <div id="pr" class="card">
            <div class="card-body">
               
                <table>
                    <tbody>
                        <tr>
                            <img src="/upload/photo/{{ $sh->photo }}">
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{$sh->email}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{$sh->address}}</td>
                        </tr>
                        <tr>
                            <td>Hobbies</td>
                            <td>:</td>
                            <td>{{$sh->hobbies}}</td>
                        </tr>
                        <tr>
                            <td>Job</td>
                            <td>:</td>
                            <td>{{$sh->job}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>{!! $sh->description !!}</td>
                        </tr>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
    </div>
    <!-- End -->
    @endsection
</body>
</html>