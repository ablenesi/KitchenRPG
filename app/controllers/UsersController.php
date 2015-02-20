<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return View::make('users.index', ['users'=>$users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(),User::$rules);
		if ($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		$user = new User();
		$user->first_name = Input::get("first_name");
		$user->last_name = Input::get("last_name");
		$user->password = Hash::make(Input::get("password"));
		$user->email = Input::get("email");
		$user->description = Input::get("description");
		$user->full_name = $user->first_name." ".$user->last_name;
		$user->image_url = "http://flathash.com/".$user->full_name;
		$user->save();

		return Redirect::route('users.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::where("id",$id)->first();
		return View::make('users.show', ['user'=>$user]);
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
	public function update()
	{
		//check if its our form
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt to create setting'
            ) );
        }
 
        $description = Input::get( 'description' ); 		

        //validate data
        $validator = Validator::make(
		    array('description' => $description),
		    array('description' => array('required', 'min:10'))
		);
        
        // save to database or sent error based on validation
        if ($validator->fails())
		{
			 $response = array(
            	'status' => 'failed',
            	'msg' => $validator->messages()->first('description'),
        	);

		}else{
			$user =Auth::user();
	 		$user->description = $description;
	 		$user->save();
	 		$response = array(
            	'status' => 'success',
            	'msg' => $description,
        	);
		}

		//handel return
		if(Input::get('ajax')==1){
			return Response::json( $response );	
		}else{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
        
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
