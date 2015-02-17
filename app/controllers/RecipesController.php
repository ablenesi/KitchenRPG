<?php

class RecipesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$recipes = Recipe::all();
		return View::make('recipes.index',['recipes'=> $recipes]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::check()){
			return View::make('recipes.create');	
		}
		return Redirect::to('/login')->with(array('error'=> "You have to login to view that page!"));
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{		
		$validation = Validator::make(Input::all(),Recipe::$rules);
		if ($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
	    $recipe = new Recipe();
	    $recipe->title = Input::get("title");
	    $recipe->description = Input::get("description");
	    $recipe->serves = Input::get("serves");
	    $recipe->prep_time = Input::get("prep_time_hours")*60 +Input::get("prep_time_minutes");
	    $recipe->cook_time = Input::get("cook_time_hours")*60 +Input::get("cook_time_minutes");
	    $recipe->image_url = "http://lorempixel.com/1200/400/food";
	    $recipe->comment_count = 0;
	    $recipe->follow_count = 0;
	    $recipe->save();
	    $user = Auth::user();
	    $user->recipes()->save($recipe);
	    $user->recipe_count = $user->recipe_count;
	    $user->save();
	    return $this->show($recipe->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$recipe = Recipe::where('id',$id)->first();
		return View::make('recipes.show',['recipe'=>$recipe]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{		
		$recipe = Recipe::where('id',$id)->first();		
		$recipe->delete();		
		return Redirect::to('recipes');
	}

}
