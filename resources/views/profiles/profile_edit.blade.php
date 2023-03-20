<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style type="text/css">
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
            overflow:auto;
            /* background-color: #000000; */
           
            /* background-image: url("F:\WorkSpace\demoLrv10\resources\image\anh1.jpg"); */
        }
        .button {  
            background-color: #58257b; 
            border: none;  
            color: white;  
            padding: 15px 32px;  
            text-align: center;  
            text-decoration: none;  
            display: inline-block;  
            font-size: 16px;
        }
        input{
            margin-left: 0;
            margin-right: 0;
        }
        #test{
            overflow: auto;
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
    <script
        src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"
        referrerpolicy="origin">
    </script>
    <script>
         tinymce.init({
            selector: 'textarea#timymce',
            
            height: 200,
            width: 500,
            
        });
     </script> 
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile Edit</h1>
        </div>

        <!-- Navbar -->
        <ul>
                <a href="{{ route('profile') }}">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

   
    <!-- End -->

    <!-- Main -->
    <div id="test">
    <div class="main" >
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                @foreach($prof1 as $row)
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                   
                    @csrf
                    <table>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" value = "{{$row->name}}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email" value = "{{$row->email}}" required autofocus>
                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="address" value = "{{$row->address}}">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Hobbies</td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="hobbies" value = "{{$row->hobbies}}">
                                            @if ($errors->has('hobbies'))
                                                <span class="text-danger">{{ $errors->first('hobbies') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Job</td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="job" value = "{{$row->job}}">
                                            @if ($errors->has('job'))
                                                <span class="text-danger">{{ $errors->first('job') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <textarea cols="50" rows="5" id="timymce" name="description">{{$row->description}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Avatar</td>
                                <td>:</td>
                                <td>
                                    <input id="photo" type="file" class="form-control" name="photo" value="{{$row->photo }}" required autocomplete="photo">
                                    @if ($errors->has('photo'))
                                      <span class="text-danger">{{ $errors->first('photo') }}</span>
                                    @endif
                                </td>    
                                <td>
                                    <img src="/upload/photo/{{ Auth::user()->photo }}" >

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </form>
                
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>