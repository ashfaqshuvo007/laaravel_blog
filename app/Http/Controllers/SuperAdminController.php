<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class SuperAdminController extends Controller {

	public function index() {

		$admin_id = Session::get('admin_id');

		if ($admin_id == null) {
			return Redirect::to('/admin-panel')->send();
		}

		$dashboard_content = view('admin.pages.dashboard_content');

		return view('admin.admin_master')
			->with('admin_content', $dashboard_content);
	}
	public function logout() {
		Session::put('admin_name', null);
		Session::put('admin_id', null);
		Session::put('message', 'You are successfully logged out!');
		return Redirect::to('/admin-panel')->send();
	}

	public function add_category() {
		$add_category = view('admin.pages.add_category');

		return view('admin.admin_master')
			->with('admin_content', $add_category);
	}

	public function save_category(Request $request) {
		$data = array();
		$data['category_name'] = $request->category_name;
		$data['category_description'] = $request->category_description;
		$data['publication_status'] = $request->publication_status;
		DB::table('tbl_category')->insert($data);
		Session::put('message', 'Saved Category information successfully');
		return Redirect::to('/add_category');
	}

	public function manage_category() {
		$category_info = DB::table('tbl_category')->get();

		$manage_category = view('admin.pages.manage_category')
			->with('all_category_info', $category_info);

		return view('admin.admin_master')
			->with('admin_content', $manage_category);
	}

	public function unpublished_category($category_id) {
		DB::table('tbl_category')
			->where('category_id', $category_id)
			->update(['publication_status' => 0]);

		return Redirect::to('/manage-category');
	}

	public function published_category($category_id) {
		DB::table('tbl_category')
			->where('category_id', $category_id)
			->update(['publication_status' => 1]);

		return Redirect::to('/manage-category');
	}

	public function delete_category($category_id) {
		DB::table('tbl_category')
			->where('category_id', $category_id)
			->delete();

		return Redirect::to('/manage-category');
	}

	public function edit_category($category_id) {
		$category_info = DB::table('tbl_category')
			->where('category_id', $category_id)
			->first();
		$edit_category = view('admin.pages.edit_category')
			->with('category_info', $category_info);

		return view('admin.admin_master')
			->with('admin_content', $edit_category);
	}

	public function update_category(Request $request) {
		$data = array();
		$category_id = $request->category_id;
		$data['category_name'] = $request->category_name;
		$data['category_description'] = $request->category_description;
		$data['publication_status'] = $request->publication_status;
		DB::table('tbl_category')
			->where('category_id', $category_id)
			->update($data);

		Session::put('message', 'Updated Category information successfully');
		return Redirect::to('/edit-category/' . $category_id);
	}

	public function add_blog() {

		$category_info = DB::table('tbl_category')
			->where('publication_status', 1)
			->get();

		$add_blog = view('admin.pages.add_blog')
			->with('category_info', $category_info);

		return view('admin.admin_master')
			->with('admin_content', $add_blog);
	}

	public function save_blog(Request $request) {
		$data = array();
		$data['blog_title'] = $request->blog_title;
		$data['category_id'] = $request->category_id;
		$data['category_id'] = $request->category_id;
		$data['blog_short_description'] = $request->blog_short_description;
		$data['blog_long_description'] = $request->blog_long_description;
		$data['publication_status'] = $request->publication_status;

		//image upload code
		$image = $request->file('blog_image');
		if ($image) {
			// Laravel built-in function
			$image_name = str_random(20);
			//built-in function to get the uploaded file ext.
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name . '.' . $ext;
			$upload_path = 'blog-image/'; //Settig up the path to save file.
			$image_url = $upload_path . $image_full_name;
			$success = $image->move($upload_path, $image_full_name);
			if ($success) {
				$data['blog_image'] = $image_url; //saving only the image URL in DB
				DB::table('tbl_blog')->insert($data);
				Session::put('message', 'Saved blog information successfully');
				return Redirect::to('/add-blog');
			}
		} else {
			DB::table('tbl_blog')->insert($data);
			Session::put('message', 'Saved blog information successfully');
			return Redirect::to('/add-blog');
		}
	}

	public function manage_blog() {
		$blog_info = DB::table('tbl_blog')
			->join('tbl_category', 'tbl_blog.category_id', '=', 'tbl_category.category_id')
			->where('tbl_blog.publication_status', 1)
			->select('tbl_blog.*', 'tbl_category.category_name')
			->get();

		$category_info = DB::table('tbl_category')
			->where('publication_status', 1)
			->get();

		$manage_blog = view('admin.pages.manage_blog')
			->with('blog_info', $blog_info);

		return view('admin.admin_master')
			->with('admin_content', $manage_blog);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//return view('')
	}

}
