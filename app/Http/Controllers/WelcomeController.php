<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;

class WelcomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $published_blog = DB::table('tbl_blog')
                    ->join('tbl_category', 'tbl_blog.category_id', '=', 'tbl_category.category_id')
                    ->where('tbl_blog.publication_status',1)
                    ->select('tbl_blog.*','tbl_category.category_name')
                    ->get();
        
        $category_name = DB::table('tbl_category')
                ->where('publication_status', '=', 1)
                ->pluck('category_name');

        $main_content = view('pages.home')
                ->with('published_blog',$published_blog);

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
        //
    }

}
