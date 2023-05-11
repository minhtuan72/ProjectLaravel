<script setup>
    import { Link } from '@inertiajs/vue3'
</script>

<template>
   <div class="div1">
        <nav class="col-md-2 d-none d-md-block sidebar" style="margin-left:2%;">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" :href=" route('posts.show_friend') ">
                            <span data-feather="file-text"></span>
                            <div id="cl-side">
                                <div id="left-cl-side">
                                    <i class="icon-post-friend"></i> 
                                </div>
                                <div id="right-cl-side">  
                                    Posts friend
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" :href=" route('posts.show') ">
                            <span data-feather="file-text"></span>
                            <div id="cl-side">
                                <div id="left-cl-side">
                                    <i class="icon-post"></i>
                                </div>
                                <div id="right-cl-side">  
                                    Posts
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" :href="route('friend')"> 
                            <span data-feather="file-text"></span>
                            <div id="cl-side">
                                <div id="left-cl-side">
                                    <i class="icon-person"></i>
                                </div>
                                <div id="right-cl-side">  
                                    Users
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :href="route('friend.list')"> 
                            <span data-feather="file-text"></span>
                            <div class="column" id="cl-side">
                                <div class="left-column" id="left-cl-side">
                                    <i class="icon-friend"></i>
                                </div>
                                <div class="right-column" id="right-cl-side">  
                                    Friend
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href=" route('profile') "> 
                            <span data-feather="file-text"></span>
                            <div class="column" id="cl-side">
                                <div class="left-column" id="left-cl-side">
                                    <i class="icon-profile"></i>
                                </div>
                                <div class="right-column" id="right-cl-side">  
                                    Profile
                                </div>
                            </div>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('match')"> 
                            <span data-feather="file-text"></span>
                            <div class="column" id="cl-side">
                                <div class="left-column" id="left-cl-side">
                                    <i class="icon-match"></i>
                                </div>
                                <div class="right-column" id="right-cl-side">  
                                    Match
                                </div>
                            </div>
                        </Link>
                    </li>
                    
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><font color="#FF0000">Logout</a>
                    </li> -->
            </ul>
          </div>
        </nav>
        </div>
</template>

<style>

</style>