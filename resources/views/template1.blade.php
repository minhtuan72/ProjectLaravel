<!Doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>DemoLrv10</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
    <!-- CSS tuy chinh -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style type="text/css">    
        body {
        font-size: .875rem;
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
        .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
        }

        /*
        * Sidebar
        */

        .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar-sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 48px; /* Height of navbar */
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
        font-weight: 500;
        color: #333;
        }

        .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
        }

        .sidebar .nav-link.active {
        color: #007bff;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
        color: inherit;
        }

        .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
        }

        /*
        * Navbar
        */

        .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
        }

        .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        /*
        * Utilities
        */

        .border-top { border-top: 1px solid #e5e5e5; }
        .border-bottom { border-bottom: 1px solid #e5e5e5; }
    </style>
    <script
        src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"
        referrerpolicy="origin">
    </script>
    <script>
         tinymce.init({
            selector: 'textarea#timymce',
            
            height: 300,
            width: 526,
            
        });
    </script> 

</head>
  <body>
   <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">DemoLrv10</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><font color="#FF0000">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}"><font color="#FF0000">Register</a>
            </li>
        @else
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
        </li>
        @endguest
      </ul>
    </nav>

    <div class="container">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><font color="#FF0000">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><font color="#FF0000">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.show_friend') }}">
                            <span data-feather="file-text"></span>    
                            Posts friend
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.show') }}">
                            <span data-feather="file-text"></span>
                            Posts
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('friend') }}"> 
                            <span data-feather="file-text"></span>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('friend.list') }}"> 
                            <span data-feather="file-text"></span>
                            Friend
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}"> 
                            <span data-feather="file-text"></span>
                            Profile
                        </a>
                    </li>
                    
                    
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><font color="#FF0000">Logout</a>
                    </li> -->
                @endguest
            </ul>

          
          </div>
        </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        
            @yield('content')
  
      
    </main>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>    
  </body>
</html>