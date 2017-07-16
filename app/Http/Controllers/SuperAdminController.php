<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;

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
        return Redirect::to('/admin-panel');
    }

    public function add_category() {
        $add_category = view('admin.pages.add_category');

        return view('admin.admin_master')
                        ->with('admin_content', $add_category);
    }

    public function save_category(Request $request) {
        $data = array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        DB::table('tbl_category')->insert($data);
        Session::put('message','Save Category information successfully');
        return Redirect::to('/add_category');
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
