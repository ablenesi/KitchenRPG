<?php

class StepsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
            	'msg' => $validator->messages()->first('description')
        	);

		}else{
			$step = new Step();
			$step->description = $description;			
			$step->image_url = "";
			$id =Input::get('id');
			$recipe = Recipe::where('id',$id)->first();
			$step->number = $recipe->steps()->count()+1;
			$recipe->steps()->save($step);
			$response = array(
            	'status' => 'success',
            	'msg' => $description,
            	'nr' => $recipe->steps()->count()
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		//
	}


}
