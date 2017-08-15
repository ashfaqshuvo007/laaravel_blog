   @extends('master')
   @section('mainContent')
<div class="post_section">

    <div class="post_date">
        30<span>Nov</span>
    </div>
    @foreach($published_blog as $v_blog)
    <div class="post_content">

        <h2><a href="{{URL::to('/blog-details/'.$v_blog->blog_id) }}">{{ $v_blog->blog_title }}</a></h2>

        <strong>Total Views : {{ $v_blog->hit_count }} </strong>| <strong>Category:</strong> <a href="#">{{ $v_blog->category_name }}</a>

        <a href="#" target="_parent"><img src="{{ $v_blog->blog_image }}" alt="image" width="400"/></a>


        <p>
            {{ $v_blog->blog_short_description }}
        </p>
        <p><a href="blog_post.html">24 Comments</a> | <a href="{{ URL::to('/blog-details/'.$v_blog->blog_id)}}">Continue reading...</a>                </p>
    </div>
     @endforeach
    <div class="cleaner"></div>
</div>



@endsection