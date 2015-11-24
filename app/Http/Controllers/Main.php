<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\people;
use App\Image;
use App\Comment;

class Main extends Controller
{
    protected $layout = 'layouts.master';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       
        if(Input::has("search")){
	$target = "%".trim(Input::get()["search"],"\"")."%";
	$images = Image::where('name', 'LIKE', $target)->get();
        }else{
	$images = Image::all();
        }
        if(Input::has("sort"))
        {
          if(Input::get()["sort"]==1)    
        {$images = $images->sortBy(function($img)
		{
		    return -sizeof($img->comments);
		});
	}
       } 
        return view("homepage",['images'=>$images]);
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
	$name =$request->input("name");
	$age = $request->input("age");
        $people = new People;
        $people->name = $name;
        $people->age = $age;
        $people->save();
        return "name={{$name}}, age={{$age}}";
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
