
@extends('template1')
   
@section('content')
<font color="#000">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label class="label">Post Title: </label>
                            <input type=text name=title class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label class="label">Post Body: </label>
                            <textarea  name=body cols="50" rows="50"  id="timymce" class="form-control" ></textarea>
                            @if ($errors->has('body'))
                                <span class="text-danger">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="label">Post Image: </label>
                            <input id="photo" type="file" class="form-control" name="photo" autocomplete="photo"> 
                            @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                            @endif          
                        </div>
                         
                        <div class="form-group"> 
                            <select name="status" id="status">
                                <option value="public">public</option>
                                <option value="private">private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type=submit class="btn btn-success" />
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection