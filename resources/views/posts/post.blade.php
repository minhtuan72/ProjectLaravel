@extends('template1')
  
@section('content')
<font color="#fff">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Manage Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: right">Create Post</a>
            <table style="background-color: #fff" class="table table-bordered">
                <thead>
                    <th>Title</th>
                    <th>Time</th>
                    <th>Time update</th>
                    <th width=150px>Action</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
               
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                    <td>{{ $post->updated_at->toDayDateTimeString() }}</td>
                    <td>
                        <a href="{{ route('posts.show') }}" class="btn btn-primary">View Post</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
   
            </table>
        </div>
    </div>
</div>
@endsection