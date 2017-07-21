   @extends('master')
   @section('mainContent')
<div class="post_section">

    <div class="post_date">
        30<span>Nov</span>
    </div>
    @foreach($published_blog as $v_blog)
    <div class="post_content">

        <h2><a href="blog_post.html">{{ $v_blog->blog_title }}</a></h2>

        <strong>Author:</strong> Steven | <strong>Category:</strong> <a href="#">{{ $v_blog->category_name }}</a>

        <a href="#" target="_parent"><img src="{{ $v_blog->blog_image }}" alt="image" width="400"/></a>

        <p><a href="http://www.templatemo.com" target="_parent">Red Blog </a> is a free HTML/CSS layout from templatemo.com for everyone. There are total 5 pages included (blog, <a href="blog_post.html">full  post</a>, services, portfolio, contact) Quisque at ante sit amet erat laoreet fermentum. Quisque nec nisl.</p>
        <p>
            {{ $v_blog->blog_short_description }}
        </p>
        <p><a href="blog_post.html">24 Comments</a> | <a href="blog_post.html">Continue reading...</a>                </p>
    </div>
     @endforeach
    <div class="cleaner"></div>
</div>
  


@endsection