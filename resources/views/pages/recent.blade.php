@extends('master')
@section('friendContent')
<h4>Recent BLog</h4>
<?php
$recent_blog = DB::table('tbl_blog')
        ->orderBy('blog_id', 'desc')
        ->where('publication_status', 1)
        ->take(2)
        ->get();
?>
<ul class="templatemo_list">
    @foreach($recent_blog as $v_blog)
    <li><a href="#">{{ $v_blog->blog_title }}</a></li>
    @endforeach
</ul>

@endsection

