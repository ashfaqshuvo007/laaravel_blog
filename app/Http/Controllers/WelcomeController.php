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
    public function index() {
        $category_name = DB::table('tbl_category')
                ->where('publication_status', '=', 1)
                ->pluck('category_name');

        $main_content = view('pages.home');

        $category = view('pages.category')
                ->with('category_name', $category_name);
        $friends = view('pages.friends');


        return view('master')
                        ->with('mainContent', $main_content)
                        ->with('category', $category)
                        ->with('friendContent', $friends);
    }

    public function portfolio() {
        $portfolio = view('pages.portfolio');
        $friends = view('pages.friends');
        return view('master')
                        ->with('mainContent', $portfolio)
                        ->with('friendContent', $friends);
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
        $friends = view('pages.friends');
        return view('master')
                        ->with('mainContent', $contact)
                        ->with('category', $category)
                        ->with('friendContent', $friends);
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
