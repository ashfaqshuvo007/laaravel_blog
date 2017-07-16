<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_content = view('pages.home');
        $category = view('pages.category');
        $friends = view('pages.friends');
        return view('master')
                ->with('mainContent',$main_content)
                ->with('category',$category)
                ->with('friendContent',$friends);
    }
    
    public function portfolio()
    {
        $portfolio = view('pages.portfolio');
        $friends = view('pages.friends');
        return view('master')
                ->with('mainContent',$portfolio)
                ->with('friendContent',$friends);
    }
    public function services()
    {
        $srvices = view('pages.services');
        $category = view('pages.category');
        //$friends = view('pages.friends');
        return view('master')
                ->with('mainContent',$srvices)
                ->with('category',$category);
                //->with('friendContent',$friends)
    }
    
      public function contact()
    {
        $contact = view('pages.contact');
        $category = view('pages.category');
        $friends = view('pages.friends');
        return view('master')
                ->with('mainContent',$contact)
                ->with('category',$category)
                ->with('friendContent',$friends);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
