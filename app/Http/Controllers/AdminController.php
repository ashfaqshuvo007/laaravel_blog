<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminController extends Controller {
	// This is the Admin Login Home page.
	public function index() {

		$admin_id = Session::get('admin_id');
		if ($admin_id != null) {
			return Redirect::to('/dashboard')->send();
		}
		return view('admin.admin_login');
	}

	//This is view for Admin Dashboard
	public function admin_login_check(Request $request) {
		$admin_email_address = $request->admin_email_address;
		$admin_password = md5($request->admin_password);
		//return view('admin.admin_master');
		$result = DB::table('tbl_admin')
			->where('admin_email_address', $admin_email_address)
			->where('admin_password', $admin_password)
			->first(); //returns data asstd class object
		if ($result) {
			Session::put('admin_name', $result->admin_name);
			Session::put('admin_id', $result->admin_id);
			return Redirect::to('/dashboard');
		} else {
			Session::put('exception', 'User Id or Password Invalid');
			return Redirect::to('admin-panel');
		}
	}

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
		//
	}
}
