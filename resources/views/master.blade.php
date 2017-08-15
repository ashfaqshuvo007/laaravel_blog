<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Project Name: Simple Blog using Laravel
Author      : Ashfaq H Ahmed
Template    : Red blog template
Email       : ahmed.ashfaq8495@gmail.com

NOTE: This is just a practice file only used for practicing skill on laravel.
-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Red Blog</title>
        <meta name="keywords" content="Red Blog Theme, Free CSS Templates" />
        <meta name="description" content="Red Blog Theme - Free CSS Templates by templatemo.com" />
        <link href="{{URL::to('public/templatemo_style.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <div id="templatemo_top_wrapper">
            <div id="templatemo_top">

                <div id="templatemo_menu">

                    <ul>
                        <li><a href="{{URL::to('/')}}" >Home</a></li>
                        <li><a href="{{URL::to('/portfolio')}}">Portfolio</a></li>
                        @if (Auth::guest())
                        <li><a href="{{URL::to('/login')}}">Login</a></li>
                        <li><a href="{{URL::to('/register')}}">Registration</a></li>
                        @else
                        <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                        @endif
                    </ul>

                </div> <!-- end of templatemo_menu -->

                <div id="twitter">
                    <a href="https://twitter.com/ashfaq8495">follow me <br />
                        on twitter</a>
                </div>

            </div>
        </div>

        <div id="templatemo_header_wrapper">
            <div id="templatemo_header">

                <div id="site_title">
                    <h1>Ashfaq Ahmed's Blog </h1>
                </div>

            </div>
        </div>

        <div id="templatemo_main_wrapper">
            <div id="templatemo_main">
                <div id="templatemo_main_top">

                    <div id="templatemo_content">
                        @yield('mainContent')

                    </div>


                    <div id="templatemo_sidebar">

                        @yield('categoryContent')

                        <div class="cleaner_h40"></div>

                        @yield('friendContent')

                        <h4>Popular Blogs</h4>
<?php
$popular_blog = DB::table('tbl_blog')
	->orderBy('hit_count', 'desc')
	->take(4)
	->get();
?>
                            <ul class="templatemo_list">
                                @foreach($popular_blog as $v_blog)
                                <li><a href="{{ URL::to('/blog-details/'.$v_blog->blog_id)}}">{{ $v_blog->blog_title }}</a> &nbsp; ({{ $v_blog->hit_count}})</li>
                                @endforeach
                            </ul>
                    </div>

                    <div class="cleaner"></div>

                </div>

            </div>

            <div id="templatemo_main_bottom"></div>

        </div>

        <div id="templatemo_footer">
            Copyright © <?php echo date('Y') ?> <a href="index.html">Ashfaq H Ahmed</a>
        </div>
</html>