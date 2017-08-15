<?php

namespace App\Http\Controllers;

use DB;

class WelcomeController extends Controller {

	public function index() {
		$published_blog = DB::table('tbl_blog')
			->join('tbl_category', 'tbl_blog.category_id', '=', 'tbl_category.category_id')
			->where('tbl_blog.publication_status', 1)
			->select('tbl_blog.*', 'tbl_category.category_name')
			->orderBy('blog_id', 'desc')
			->get();

		$category_name = DB::table('tbl_category')
			->where('publication_status', '=', 1)
			->pluck('category_name');

		$main_content = view('pages.home')
			->with('published_blog', $published_blog);

		$category = view('pages.category')
			->with('category_name', $category_name);
		$recent = view('pages.recent');

		return view('master')
			->with('mainContent', $main_content)
			->with('category', $category)
			->with('friendContent', $recent);
	}

	public function portfolio() {
		$portfolio = view('pages.portfolio');
		$recent = view('pages.recent');
		return view('master')
			->with('mainContent', $portfolio)
			->with('friendContent', $recent);
	}

	public function services() {
		$category_name = DB::table('tbl_category')
			->where('publication_status', '=', 1)
			->pluck('category_name');

		$srvices = view('pages.services');
		$category = view('pages.category')
			->with('category_name', $category_name);
		//$friends = view('pages.friends');
		return view('master')
			->with('mainContent', $srvices)
			->with('category', $category);
		//->with('friendContent',$friends)
	}

	public function contact() {
		$category_name = DB::table('tbl_category')
			->where('publication_status', '=', 1)
			->pluck('category_name');

		$contact = view('pages.contact');
		$category = view('pages.category')
			->with('category_name', $category_name);
		$recent = view('pages.recent');
		return view('master')
			->with('mainContent', $contact)
			->with('category', $category)
			->with('friendContent', $recent);
	}

	public function blog_details($blog_id) {

		$blog_info = DB::table('tbl_blog')
			->where('blog_id', $blog_id)
			->first();

		$data = array();

		$data['hit_count'] = $blog_info->hit_count + 1;

		DB::table('tbl_blog')
			->where('blog_id', $blog_id)
			->update($data);

		$blog_info_id = DB::table('tbl_blog')
			->join('tbl_category', 'tbl_blog.category_id', '=', 'tbl_category.category_id')
			->where('tbl_blog.blog_id', $blog_id)
			->select('tbl_blog.*', 'tbl_category.category_name')
			->first();

		$category_name = DB::table('tbl_category')
			->where('publication_status', '=', 1)
			->pluck('category_name');

		$blog_details = view('pages.blog_details')
			->with('blog_info', $blog_info_id);

		$category = view('pages.category')
			->with('category_name', $category_name);

		$recent = view('pages.recent');

		return view('master')
			->with('mainContent', $blog_details)
			->with('category', $category)
			->with('friendContent', $recent);

	}

}
