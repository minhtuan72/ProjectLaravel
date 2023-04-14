
@extends('template')
   
@section('content')
<font color="#000">
<div class="container"  onload="getValue()">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form name="form_name" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label class="label" >Post Title: </label>
                            <input id="id_title"  type=text name=title class="form-control" required/>
                        </div>

                        <div id="test1" class="form-group">
                            <label  onclick="getValue()" id="test"  class="label">Post Body: </label>
                            <textarea id="timymce" class="form-control" jsaction="mouseover:leftNav.mouseOverAction;leftNav.clickAction;dblclick:leftNav.doubleClickAction" oninput="getValue()" name=body cols="50" rows="50"   ></textarea>
                            @if ($errors->has('body'))
                                <span class="text-danger">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                        <!-- Test -->
                        <div id="container">
                        <div id="foo"
                            jsaction="leftNav.clickAction;dblclick:leftNav.doubleClickAction">
                            some content here
                        </div>
                        </div>
                        <!-- End Test -->
                        <p id="values"></p>
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
<script type="text/javascript">
                   
                //    var obj = document.getElementById('timymce');
                //    timymce.addEventListener('mouseover', function(){
                //         console.log("hallo");
                //     });
                    // var myContent = tinymce.get("timymce").getContent();
                    // console.log(myContent);
                    function getValue(){
                        //console.log(document.forms['form_name'].timymce.value);
                            // var html = document.getElementById("test1").innerValue;
                            // console.log(html);
                        //tinymce.get("timymce").setContent("<p>Hello world!</p>");
                        var myContent = tinymce.get("timymce").getContent();
                        console.log(myContent);
                        // $jq2("#timymce_ifr").contents().find("#tinymce").html();
                        //console.log($('[data-id="timymce"] p').text());
                        //console($('[data-id="timymce"]'));
                    }
                    
                    /**jsaction**/ 
                    const eventContract = new jsaction.EventContract();

                    // Events will be handled for all elements under this container.
                    eventContract.addContainer(document.getElementById('test1'));

                    // Register the event types we care about.
                    eventContract.addEvent('click');
                    eventContract.addEvent('mouseover');

                    const dispatcher = new jsaction.Dispatcher();
                    eventContract.dispatchTo(dispatcher.dispatch.bind(dispatcher));

                    // Register individual handlers
                    const click = function(flow) {
                    // do stuff
                    alert('click event dispatched!');
                    };
                    const mouseOver = function(flow) {
                    // do stuff
                    console.log('mouseover called!');
                    };

                    dispatcher.registerHandlers(
                    'leftNav', // the namespace
                    null, // handler object
                    { // action map
                        'clickAction': click,
                        'mouseOverAction': mouseOver,
                    });



                    /****/
                    const input = document.querySelector("#timymce");
                    const log = document.getElementById("values");
                    
                    input.addEventListener("input", updateValue);

                    function updateValue(e) {
                        log.textContent = e.target.value;
                        console.log(e.target.value);
                    }
                  
            </script>

</font>
@endsection