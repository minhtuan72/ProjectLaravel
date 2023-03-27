<!Doctype html>
<html lang="en">
  <head>
    <title>DemoLrv10</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
    <!-- CSS tuy chinh -->
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
   <header>
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <a class="navbar-brand" href="#">DemoLrv10</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

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
                    
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><font color="#FF0000">Logout</a>
                    </li>
                @endguest
            </ul>
        </div>
      </nav>
    </header>
    
   
@yield('content')
    
    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>    
  </body>
</html>