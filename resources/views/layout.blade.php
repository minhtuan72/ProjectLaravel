<!DOCTYPE html>
<html>
<head>
    <title>DemoLrv10</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
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
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            
            font-family: Raleway, sans-serif;
        }
        .card-body
        {
            background: url({{ Vite::asset('resources/image/anh1.jpg') }})no-repeat;
            background-attachment: fixed;
                 /* background-position: center; */
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover; 
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            
            margin-left: 0;
            margin-right: 0;
        }
        /* .nav-link
        {
            color: #B22222;
        } */
       
    </style>
    <script
        src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"
        referrerpolicy="origin">
    </script>
    <script>
         tinymce.init({
            selector: 'textarea#timymce',
            
            height: 300,
            width: 690,
            
        });
    </script> 
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><font color="#FF0000">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><font color="#FF0000">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.show_friend') }}">Posts friend</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.show') }}">Posts</a>
                    </li>

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
                        <a class="nav-link" href="{{ route('logout') }}"><font color="#FF0000">Logout</a>
                    </li>
                @endguest
            </ul>
  
        </div>
    </div>
</nav>
  
@yield('content')
     
</body>
<script
        src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>