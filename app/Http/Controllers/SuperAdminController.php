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
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Save Category information successfully');
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
                ->with('edit_category_info', $category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $edit_category);
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
