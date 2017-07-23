@extends('master')
@section('mainContent')
<div class="post_section">

    <div class="post_date">
        30<span>Nov</span>
    </div>

    <div class="post_content">

        <h2>{{ $blog_info->blog_title }}</h2>

        <strong>Author:</strong> Steven | <strong>Category:</strong> <a href="#">{{ $blog_info->category_name }}</a>

        <a href="#" target="_parent"><img src="{{URL::to($blog_info->blog_image)}}" alt="image" width="400"/></a>


        <p>
           <?php echo $blog_info->blog_long_description; ?>
        </p>

    </div>

    <div class="cleaner"></div>
</div>



@endsection