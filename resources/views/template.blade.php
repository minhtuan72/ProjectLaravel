<!Doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>DemoLrv10</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">

    <script src="https://www.gstatic.com/jsaction/contract.js"></script>
    <script src="https://www.gstatic.com/jsaction/dispatcher.js" ></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    
    <!-- CSS tuy chinh -->
    <style type="text/css">    
        body {
        font-size: 1rem;
        position: relative;
        }
        .card-body
        {
         
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
        width: 100%;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        background: rgb(239 242 245);
        }

        .sidebar-sticky {
        position: sticky;
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
        height: calc(100vh - 60px);
        padding-top: 1rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
        font-weight: 700;
        color: #333;
        }
        .nav-item {
           height: 50px;
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
      

        /* row */
        #rowid.row {
        display: grid;
        grid-template-columns: 1fr 6fr 1.5fr repeat(2, 0fr);
        grid-template-rows: repeat(5, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        }

        .div1 { grid-area: 1 / 1 / 2 / 2; }
        .div2 { grid-area: 1 / 2 / 2 / 3; }
        
        .div3 { grid-area: 1 / 3 / 2 / 4; }

	    .codepro-custom-btn{
            width:130px;height:40px;color:#fff;border-radius:5px;padding:10px 25px;font-family:'Lato',sans-serif;font-weight:500;background:transparent;cursor:pointer;transition:all 0.3s ease;position:relative;display:inline-block;box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);outline:none}.codepro-btn-1{background:rgb(6,14,131);background:linear-gradient(0deg,rgba(6,14,131,1) 0%,rgba(12,25,180,1) 100%);border:none
        }
            .codepro-btn-1:hover{background:rgb(0,3,255);background:linear-gradient(0deg,rgba(0,3,255,1) 0%,rgba(2,126,251,1) 100%)}.codepro-btn-2{background:rgb(96,9,240);background:linear-gradient(0deg,rgba(96,9,240,1) 0%,rgba(129,5,240,1) 100%);border:none}.codepro-btn-2:before{height:0%;width:2px}.codepro-btn-2:hover{box-shadow:4px 4px 6px 0 rgba(255,255,255,.5),-4px -4px 6px 0 rgba(116,125,136,.5),inset -4px -4px 6px 0 rgba(255,255,255,.2),inset 4px 4px 6px 0 rgba(0,0,0,.4)}.codepro-btn-3{background:rgb(0,172,238);background:linear-gradient(0deg,rgba(0,172,238,1) 0%,rgba(2,126,251,1) 100%);width:130px;height:40px;line-height:42px;padding:0;border:none}.codepro-btn-3 span{position:relative;display:block;width:100%;height:100%}.codepro-btn-3:before,.codepro-btn-3:after{position:absolute;content:"";right:0;top:0;background:rgba(2,126,251,1);transition:all 0.3s ease}.codepro-btn-3:before{height:0%;width:2px}.codepro-btn-3:after{width:0%;height:2px}.codepro-btn-3:hover{background:transparent;box-shadow:none}.codepro-btn-3:hover:before{height:100%}.codepro-btn-3:hover:after{width:100%}.codepro-btn-3 span:hover{color:rgba(2,126,251,1)}.codepro-btn-3 span:before,.codepro-btn-3 span:after{position:absolute;content:"";left:0;bottom:0;background:rgba(2,126,251,1);transition:all 0.3s ease}.codepro-btn-3 span:before{width:2px;height:0%}.codepro-btn-3 span:after{width:0%;height:2px}.codepro-btn-3 span:hover:before{height:100%}.codepro-btn-3 span:hover:after{width:100%}.codepro-btn-4{background-color:#4dccc6;background-image:linear-gradient(315deg,#4dccc6 0%,#96e4df 74%);line-height:42px;padding:0;border:none}.codepro-btn-4:hover{background-color:#89d8d3;background-image:linear-gradient(315deg,#89d8d3 0%,#03c8a8 74%)}.codepro-btn-4 span{position:relative;display:block;width:100%;height:100%}.codepro-btn-4:before,.codepro-btn-4:after{position:absolute;content:"";right:0;top:0;box-shadow:4px 4px 6px 0 rgba(255,255,255,.9),-4px -4px 6px 0 rgba(116,125,136,.2),inset -4px -4px 6px 0 rgba(255,255,255,.9),inset 4px 4px 6px 0 rgba(116,125,136,.3);transition:all 0.3s ease}.codepro-btn-4:before{height:0%;width:.1px}.codepro-btn-4:after{width:0%;height:.1px}.codepro-btn-4:hover:before{height:100%}.codepro-btn-4:hover:after{width:100%}.codepro-btn-4 span:before,.codepro-btn-4 span:after{position:absolute;content:"";left:0;bottom:0;box-shadow:4px 4px 6px 0 rgba(255,255,255,.9),-4px -4px 6px 0 rgba(116,125,136,.2),inset -4px -4px 6px 0 rgba(255,255,255,.9),inset 4px 4px 6px 0 rgba(116,125,136,.3);transition:all 0.3s ease}.codepro-btn-4 span:before{width:.1px;height:0%}.codepro-btn-4 span:after{width:0%;height:.1px}.codepro-btn-4 span:hover:before{height:100%}.codepro-btn-4 span:hover:after{width:100%}.codepro-btn-5{width:130px;height:40px;line-height:42px;padding:0;border:none;background:rgb(255,27,0);background:linear-gradient(0deg,rgba(255,27,0,1) 0%,rgba(251,75,2,1) 100%)}.codepro-btn-5:hover{color:#f0094a;background:transparent;box-shadow:none}.codepro-btn-5:before,.codepro-btn-5:after{content:'';position:absolute;top:0;right:0;height:2px;width:0;background:#f0094a;box-shadow:-1px -1px 5px 0 #fff,7px 7px 20px 0 #0003,4px 4px 5px 0 #0002;transition:400ms ease all}.codepro-btn-5:after{right:inherit;top:inherit;left:0;bottom:0}.codepro-btn-5:hover:before,.codepro-btn-5:hover:after{width:100%;transition:800ms ease all}.codepro-btn-6{background:rgb(247,150,192);background:radial-gradient(circle,rgba(247,150,192,1) 0%,rgba(118,174,241,1) 100%);line-height:42px;padding:0;border:none}.codepro-btn-6 span{position:relative;display:block;width:100%;height:100%}.codepro-btn-6:before,.codepro-btn-6:after{position:absolute;content:"";height:0%;width:1px;box-shadow:-1px -1px 20px 0 rgba(255,255,255,1),-4px -4px 5px 0 rgba(255,255,255,1),7px 7px 20px 0 rgba(0,0,0,.4),4px 4px 5px 0 rgba(0,0,0,.3)}.codepro-btn-6:before{right:0;top:0;transition:all 500ms ease}.codepro-btn-6:after{left:0;bottom:0;transition:all 500ms ease}.codepro-btn-6:hover{background:transparent;color:#76aef1;box-shadow:none}.codepro-btn-6:hover:before{transition:all 500ms ease;height:100%}.codepro-btn-6:hover:after{transition:all 500ms ease;height:100%}.codepro-btn-6 span:before,.codepro-btn-6 span:after{position:absolute;content:"";box-shadow:-1px -1px 20px 0 rgba(255,255,255,1),-4px -4px 5px 0 rgba(255,255,255,1),7px 7px 20px 0 rgba(0,0,0,.4),4px 4px 5px 0 rgba(0,0,0,.3)}.codepro-btn-6 span:before{left:0;top:0;width:0%;height:.5px;transition:all 500ms ease}.codepro-btn-6 span:after{right:0;bottom:0;width:0%;height:.5px;transition:all 500ms ease}.codepro-btn-6 span:hover:before{width:100%}.codepro-btn-6 span:hover:after{width:100%}.codepro-btn-7{background:linear-gradient(0deg,rgba(255,151,0,1) 0%,rgba(251,75,2,1) 100%);line-height:42px;padding:0;border:none}.codepro-btn-7 span{position:relative;display:block;width:100%;height:100%}.codepro-btn-7:before,.codepro-btn-7:after{position:absolute;content:"";right:0;bottom:0;background:rgba(251,75,2,1);box-shadow:-7px -7px 20px 0 rgba(255,255,255,.9),-4px -4px 5px 0 rgba(255,255,255,.9),7px 7px 20px 0 rgba(0,0,0,.2),4px 4px 5px 0 rgba(0,0,0,.3);transition:all 0.3s ease}.codepro-btn-7:before{height:0%;width:2px}.codepro-btn-7:after{width:0%;height:2px}.codepro-btn-7:hover{color:rgba(251,75,2,1);background:transparent}.codepro-btn-7:hover:before{height:100%}.codepro-btn-7:hover:after{width:100%}.codepro-btn-7 span:before,.codepro-btn-7 span:after{position:absolute;content:"";left:0;top:0;background:rgba(251,75,2,1);box-shadow:-7px -7px 20px 0 rgba(255,255,255,.9),-4px -4px 5px 0 rgba(255,255,255,.9),7px 7px 20px 0 rgba(0,0,0,.2),4px 4px 5px 0 rgba(0,0,0,.3);transition:all 0.3s ease}.codepro-btn-7 span:before{width:2px;height:0%}.codepro-btn-7 span:after{height:2px;width:0%}.codepro-btn-7 span:hover:before{height:100%}.codepro-btn-7 span:hover:after{width:100%}.codepro-btn-8{background-color:#f0ecfc;background-image:linear-gradient(315deg,#f0ecfc 0%,#c797eb 74%);line-height:42px;padding:0;border:none}.codepro-btn-8 span{position:relative;display:block;width:100%;height:100%}.codepro-btn-8:before,.codepro-btn-8:after{position:absolute;content:"";right:0;bottom:0;background:#c797eb;transition:all 0.3s ease}.codepro-btn-8:before{height:0%;width:2px}.codepro-btn-8:after{width:0%;height:2px}.codepro-btn-8:hover:before{height:100%}.codepro-btn-8:hover:after{width:100%}.codepro-btn-8:hover{background:transparent}.codepro-btn-8 span:hover{color:#c797eb}.codepro-btn-8 span:before,.codepro-btn-8 span:after{position:absolute;content:"";left:0;top:0;background:#c797eb;transition:all 0.3s ease}.codepro-btn-8 span:before{width:2px;height:0%}.codepro-btn-8 span:after{height:2px;width:0%}.codepro-btn-8 span:hover:before{height:100%}.codepro-btn-8 span:hover:after{width:100%}.codepro-btn-9{border:none;transition:all 0.3s ease;overflow:hidden}.codepro-btn-9:after{position:absolute;content:" ";z-index:-1;top:0;left:0;width:100%;height:100%;background-color:#1fd1f9;background-image:linear-gradient(315deg,#1fd1f9 0%,#b621fe 74%);transition:all 0.3s ease}.codepro-btn-9:hover{background:transparent;box-shadow:4px 4px 6px 0 rgba(255,255,255,.5),-4px -4px 6px 0 rgba(116,125,136,.2),inset -4px -4px 6px 0 rgba(255,255,255,.5),inset 4px 4px 6px 0 rgba(116,125,136,.3);color:#fff}.codepro-btn-9:hover:after{-webkit-transform:scale(2) rotate(180deg);transform:scale(2) rotate(180deg);box-shadow:4px 4px 6px 0 rgba(255,255,255,.5),-4px -4px 6px 0 rgba(116,125,136,.2),inset -4px -4px 6px 0 rgba(255,255,255,.5),inset 4px 4px 6px 0 rgba(116,125,136,.3)}
            
            .codepro-btn-10{background:rgb(22,9,240);background:linear-gradient(0deg,rgba(22,9,240,1) 0%,rgba(49,110,244,1) 100%);color:#fff;border:none;transition:all 0.3s ease;overflow:hidden}
            .codepro-btn-10:after{position:absolute;content:" ";top:0;left:0;z-index:-1;width:100%;height:100%;transition:all 0.3s ease;-webkit-transform:scale(.1);transform:scale(.1)}
            .codepro-btn-10:hover{color:#fff;border:none;background:transparent}
            .codepro-btn-10:hover:after{background:rgb(0,3,255);background:linear-gradient(0deg,rgba(2,126,251,1) 0%,rgba(0,3,255,1)100%);-webkit-transform:scale(1);transform:scale(1)}.codepro-btn-11{border:none;background:rgb(251,33,117);background:linear-gradient(0deg,rgba(251,33,117,1) 0%,rgba(234,76,137,1) 100%);color:#fff;overflow:hidden}.codepro-btn-11:hover{text-decoration:none;color:#fff}.codepro-btn-11:before{position:absolute;content:'';display:inline-block;top:-180px;left:0;width:30px;height:100%;background-color:#fff;animation:shiny-btn1 3s ease-in-out infinite}.codepro-btn-11:hover{opacity:.7}.codepro-btn-11:active{box-shadow:4px 4px 6px 0 rgba(255,255,255,.3),-4px -4px 6px 0 rgba(116,125,136,.2),inset -4px -4px 6px 0 rgba(255,255,255,.2),inset 4px 4px 6px 0 rgba(0,0,0,.2)}@-webkit-keyframes shiny-btn1{0%{-webkit-transform:scale(0) rotate(45deg);opacity:0}80%{-webkit-transform:scale(0) rotate(45deg);opacity:0.5}81%{-webkit-transform:scale(4) rotate(45deg);opacity:1}100%{-webkit-transform:scale(50) rotate(45deg);opacity:0}}
            
            .codepro-btn-12{position:relative;right:20px;bottom:20px;border:none;box-shadow:none;width:130px;height:40px;line-height:42px;-webkit-perspective:230px;perspective:230px}
            .codepro-btn-12 span{background:rgb(22,9,240);background:linear-gradient(0deg,#d34f7b 0%,#eb7b4f 100%);display:block;position:absolute;width:130px;height:40px;box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);border-radius:5px;margin:0;text-align:center;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-transition:all .3s;transition:all .3s}
            .codepro-btn-12 span:nth-child(1){box-shadow:-7px -7px 20px 0 #fff9,-4px -4px 5px 0 #fff9,7px 7px 20px 0 #0002,4px 4px 5px 0 #0001;-webkit-transform:rotateX(90deg);-moz-transform:rotateX(90deg);transform:rotateX(90deg);-webkit-transform-origin:50% 50% -20px;-moz-transform-origin:50% 50% -20px;transform-origin:50% 50% -20px}
            .codepro-btn-12 span:nth-child(2){-webkit-transform:rotateX(0deg);-moz-transform:rotateX(0deg);transform:rotateX(0deg);-webkit-transform-origin:50% 50% -20px;-moz-transform-origin:50% 50% -20px;transform-origin:50% 50% -20px}
            .codepro-btn-12:hover span:nth-child(1){box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);-webkit-transform:rotateX(0deg);-moz-transform:rotateX(0deg);transform:rotateX(0deg)}
            .codepro-btn-12:hover span:nth-child(2){box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);color:transparent;-webkit-transform:rotateX(-90deg);-moz-transform:rotateX(-90deg);transform:rotateX(-90deg)}
            
            .codepro-btn-17{position:relative;right:20px;bottom:20px;border:none;box-shadow:none;width:130px;height:40px;line-height:42px;-webkit-perspective:230px;perspective:230px}
            .codepro-btn-17 span{background:rgb(22,9,240);background:linear-gradient(0deg,#e39393 0%,rgb(94, 66, 66) 100%);display:block;position:absolute;width:130px;height:40px;box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);border-radius:5px;margin:0;text-align:center;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-transition:all .3s;transition:all .3s}
            .codepro-btn-17 span:nth-child(1){box-shadow:-7px -7px 20px 0 #fff9,-4px -4px 5px 0 #fff9,7px 7px 20px 0 #0002,4px 4px 5px 0 #0001;-webkit-transform:rotateX(90deg);-moz-transform:rotateX(90deg);transform:rotateX(90deg);-webkit-transform-origin:50% 50% -20px;-moz-transform-origin:50% 50% -20px;transform-origin:50% 50% -20px}
            .codepro-btn-17 span:nth-child(2){-webkit-transform:rotateX(0deg);-moz-transform:rotateX(0deg);transform:rotateX(0deg);-webkit-transform-origin:50% 50% -20px;-moz-transform-origin:50% 50% -20px;transform-origin:50% 50% -20px}
            .codepro-btn-17:hover span:nth-child(1){box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);-webkit-transform:rotateX(0deg);-moz-transform:rotateX(0deg);transform:rotateX(0deg)}
            .codepro-btn-17:hover span:nth-child(2){box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);color:transparent;-webkit-transform:rotateX(-90deg);-moz-transform:rotateX(-90deg);transform:rotateX(-90deg)}

            .codepro-btn-13{background-color:#89d8d3;background-image:linear-gradient(315deg,#89d8d3 0%,#03c8a8 74%);border:none;z-index:1}.codepro-btn-13:after{position:absolute;content:"";width:100%;height:0;bottom:0;left:0;z-index:-1;border-radius:5px;background-color:#4dccc6;background-image:linear-gradient(315deg,#4dccc6 0%,#96e4df 74%);box-shadow:-7px -7px 20px 0 #fff9,-4px -4px 5px 0 #fff9,7px 7px 20px 0 #0002,4px 4px 5px 0 #0001;transition:all 0.3s ease}.codepro-btn-13:hover{color:#fff}.codepro-btn-13:hover:after{top:0;height:100%}.codepro-btn-13:active{top:2px}.codepro-btn-14{background:rgb(255,151,0);border:none;z-index:1}.codepro-btn-14:after{position:absolute;content:"";width:100%;height:0;top:0;left:0;z-index:-1;border-radius:5px;background-color:#eaf818;background-image:linear-gradient(315deg,#eaf818 0%,#f6fc9c 74%);box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5);7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);transition:all 0.3s ease}.codepro-btn-14:hover{color:#000}.codepro-btn-14:hover:after{top:auto;bottom:0;height:100%}.codepro-btn-14:active{top:2px}.codepro-btn-15{background:#b621fe;border:none;z-index:1}.codepro-btn-15:after{position:absolute;content:"";width:0;height:100%;top:0;right:0;z-index:-1;background-color:#663dff;border-radius:5px;box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);transition:all 0.3s ease}.codepro-btn-15:hover{color:#fff}.codepro-btn-15:hover:after{left:0;width:100%}.codepro-btn-15:active{top:2px}.codepro-btn-16{border:none;color:#000}.codepro-btn-16:after{position:absolute;content:"";width:0;height:100%;top:0;left:0;direction:rtl;z-index:-1;box-shadow:-7px -7px 20px 0 #fff9,-4px -4px 5px 0 #fff9,7px 7px 20px 0 #0002,4px 4px 5px 0 #0001;transition:all 0.3s ease}
            .codepro-btn-16:hover{color:#000}.codepro-btn-16:hover:after{left:auto;right:0;width:100%}.codepro-btn-16:active{top:2px}

    </style>
    <!-- include summernote css/js -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="trumbowyg/dist/trumbowyg.min.js"></script> -->
    <script
        src="https://cdn.tiny.cloud/1/luipbi5g6jb2giurl5uugvudg24ir8x6peo06te9rfsdxupw/tinymce/5/tinymce.min.js"
        referrerpolicy="origin">
    </script>
    <script>
     
         tinymce.init({
            selector: '#timymce',
            //editor_selector : "form-control"  
            plugins: "autoresize bold italic bullist emoticons image example help",
            toolbar_location: "bottom",
            menubar: false,

            // plugins: "autoresize",
            autoresize_bottom_margin: 200,
            max_height: 500,
            // height: 350,
            width: 563,
            
            placeholder: "Enter message . . .",
            toolbar:
                "bold italic bullist emoticons image example|help",
            
            setup: function test(editor) {
                editor.on('KeyUp', function(e) {
                   // tinymce.activeEditor.hide(); 
                   console.log(e.key);
                   if(e.key=='@'){
                    getValue();
                   }
                    //console.log("temp: "+document.forms['form_name'].title.value);
                   
                   //editor.setContent('<p>Hello world!</p>');
                    // const input = document.querySelector("#timymce");
                    // const log = document.getElementById("values");
                    
                    // input.addEventListener("input", updateValue);

                    // function updateValue(e) {
                    //     log.textContent = e.target.value;
                    //     console.log(e.target.value);
                    // }
                });
            }
        });
        // tinymce.init({
        //     selector: '#myInput_24',
        //     //editor_selector : "form-control"  
        //     // plugins: "autoresize bold italic bullist emoticons image example help",
        //     toolbar: false,
        //     menubar: false,
        //     skin: "naked",
        //     icons: 'small',
        //     // plugins: "autoresize",
        //     autoresize_bottom_margin: 200,
        //     max_height: 200,
        //     height: 70,
        //     width: 600,
        //     //valid_children : "+body[style]",
        //     content_css : "../css/style.css",
        //     placeholder: "Enter message . . .",
     
        //     setup: function test(editor) {
        //         editor.on('input', function(e) {
        //             console.log('Vào!');
        //             //tinymce.activeEditor.hide(); 
        //             console.log(e);
        //            //if(e.key=='@'){
        //             myTest(25);
        //            //} 
        //            preView(25);               
        //         });
        //     }
        // });
       
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
</head>
  <body style="background: rgb(239 242 245); ">
    <!-- Nav -->  
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0" style="position: fixed;width: 100%;">
      <a class="navbar-brand col-sm-3 mr-0" href="#" style="margin-left:2%; flex: 0 0 16.666667%; max-width: 15%;"> &nbsp;DemoLrv10</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav " style="padding-left: 4rem!important; padding-right: 4rem!important; background: #252b30">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" style="color:#FF0000;">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}" style="color:#FF0000;">Register</a>
            </li>
        @else
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}" style="color:#fff;">Sign out</a>
        </li>
        @endguest
      </ul>
    </nav>
    <!-- End Nav -->

    <!-- Container -->
    <div class="container" >

      <!-- Div row -->
      <div id="rowid" class="row" >

        <!-- Sidebar -->
        <div class="div1">
        <nav class="col-md-2 d-none d-md-block sidebar" style="margin-left:2%;">
          <div class="sidebar-sticky" style="background: rgb(239 242 245);">
            <ul class="nav flex-column">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="color:#FF0000;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" style="color:#FF0000;">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.show_friend') }}">
                            <span data-feather="file-text"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-file-post-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM4.5 3h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5z"/>
                            </svg>    
                            Posts friend
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.show') }}">
                            <span data-feather="file-text"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-file-post" viewBox="0 0 16 16">
                                <path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8z"/>
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                            </svg>
                            Posts
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('friend') }}"> 
                            <span data-feather="file-text"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                            </svg>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('friend.list') }}"> 
                            <span data-feather="file-text"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                            </svg>
                            Friend
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}"> 
                            <span data-feather="file-text"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('match') }}"> 
                            <span data-feather="file-text"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart-half" viewBox="0 0 16 16">
                                <path d="M8 2.748v11.047c3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                            Match
                        </a>
                    </li>
                    
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><font color="#FF0000">Logout</a>
                    </li> -->
                @endguest
            </ul>
          </div>
        </nav>
        </div>
        <!-- End sidebar -->

        <!-- Main -->
        <div class="div2" >
        <main role="main" class="col-md-9 bx--col-sm-2 col-lg-10 pt-3 px-4" style="width:55%;  position: absolute;">
            
                @yield('content')
    
        
        </main>
        </div>
        <!-- End main -->
        
        <!-- aside -->
        <div class="div3">
        <aside class="navbar navbar-dark sticky-top pb-5 " style="position: fixed; right:1%; margin-top: 5%; width: 350px; height: 500px;">
            <div class="my-1 p-3 bg-white rounded box-shadow" style="width: 100%; height: 100%;">
                <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
                <div class="media text-muted pt-3">
                <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                    </div>
                    <span class="d-block">@username</span>
                </div>
                </div>
                <div class="media text-muted pt-3">
                <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                    </div>
                    <span class="d-block">@username</span>
                </div>
                </div>
                <div class="media text-muted pt-3">
                <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                    </div>
                    <span class="d-block">@username</span>
                </div>
                </div>
                <small class="d-block text-right mt-3">
                <a href="#">All suggestions</a>
                </small>
            </div>
        </aside>
        </div>
        <!-- End aside -->

      </div>
      <!-- End div row -->

    </div>
    <!-- End container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>   -->
   
    <!-- Import Trumbowyg -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Import Trumbowyg plugins... -->
    <!-- <script src="trumbowyg/dist/plugins/upload/trumbowyg.cleanpaste.min.js"></script>
    <script src="trumbowyg/dist/plugins/upload/trumbowyg.pasteimage.min.js"></script> -->

    <!-- Init Trumbowyg -->
  <!-- <script>
     $('#myInput').trumbowyg();
  </script> -->
  </body>
</html>