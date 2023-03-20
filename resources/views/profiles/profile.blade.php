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
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>

        <!-- Navbar -->
        <ul>
            <!-- <li>
                <a href="#message">
                    <span class="icon-count">29</span>
                    <i class="fa fa-envelope fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="#notification">
                    <span class="icon-count">59</span>
                    <i class="fa fa-bell fa-2x"></i>
                </a>
            </li> -->
            <!-- <li>
                <a href="{{ route('doash') }}">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li> -->
            

            <li class="nav-item">
                <a class="nav-link" href="{{ route('friend') }}">Users</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('friend.list') }}">Friend</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('doash') }}">Dashboard</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"><font color="#FF0000">Logout</a>
            </li>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

   
    <!-- End -->

    <!-- Main -->
    <font color="#000000">
    <div id="test">
    <div class="main" >
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('profile_edit') }}" class="fa fa-pen fa-xs edit"></a>
                @foreach($prof1 as $row)
                <table>
                    <tbody>
                        <tr>
                            <img src="/upload/photo/{{ Auth::user()->photo }}">
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>{{$row->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{$row->email}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{$row->address}}</td>
                        </tr>
                        <tr>
                            <td>Hobbies</td>
                            <td>:</td>
                            <td>{{$row->hobbies}}</td>
                        </tr>
                        <tr>
                            <td>Job</td>
                            <td>:</td>
                            <td>{{$row->job}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>{!! $row->description !!}</td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
        </div>

        <h2>SOCIAL MEDIA</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <div class="social-media">
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-invision fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End -->
</body>
</html>