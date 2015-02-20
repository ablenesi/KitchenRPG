<?php

class IngredientsController extends \BaseController {

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
 
        $name = Input::get( 'name' );
        $quantity = Input::get( 'quantity' );
        $unit = Input::get( 'unit' );

        //validate data
        $validator = Validator::make(
		    array(	'name' => $name,
		    		'quantity' => $quantity,
		    		'unit' => $unit),
		    array(	'name' => array('required', 'min:2'),
		    		'quantity' => array('required','numeric','min:1'),
		    		'unit' => array('required', 'min:1'))
		);
        
        // save to database or sent error based on validation
        if ($validator->fails())
		{
			 $response = array(
            	'status' => 'failed',
            	'errorMsgName' => $validator->messages()->first('name'),
            	'errorMsgQuantity' => $validator->messages()->first('quantity'),
            	'errorMsgUnit' => $validator->messages()->first('unit'),
        	);

		}else{
			$ingredient = new Ingredient();
			$ingredient->name = $name;
			$ingredient->quantity = $quantity;
			$ingredient->unit = $unit;
			$recipe = Recipe::where('id',Input::get('id'))->first();
			$recipe->ingredients()->save($ingredient);
			
			$response = array(
				'status' => 'success',
				'name' => $name,
				'quantity' => $quantity,
				'unit' => $unit
			);				
		}

		//handel return
		if(Input::get('ajax') == 1){
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
