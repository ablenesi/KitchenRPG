@if(Auth::check())
@if(Auth::user()->id == $recipe->user->id)
<br/>
{{ Form::open(['route' => 'ingredients.store', 'files' => true]) }}
	<div class="row">
		<div class="col-sm-4">
			<!-- Name -->
		    @if( $errors->first('name'))
		    <div class = "form-group has-error">
		      {{ Form::text('name', '',array(
		      'class'=>"form-control input-sm",
		      'placeholder' => "Name")) }}
		      <p class="text-danger" role="alert">{{$errors->first('name')}}</p>
		    </div>
		    @else
		    <div class = "form-group">
		      {{ Form::text('name', '',array(
		      'class'=>"form-control  input-sm",
		      'placeholder' => "Name" )) }}
		    </div>
		    @endif	
		</div>
		<div class="col-sm-4">
			<!-- Quantity -->
		    @if( $errors->first('quantity'))
		    <div class = "form-group has-error">
		      {{ Form::number('quantity', '',array(
		      'class'=>"form-control input-sm",
		      'placeholder' => "Quantity")) }}      
		      <p class="text-danger" role="alert">{{$errors->first('quantity')}}</p>
		    </div>
		    @else
		    <div class = "form-group">
		      {{ Form::number('quantity', '',array(
		      'class'=>"form-control  input-sm",
		      'placeholder' => "Quantity" )) }}
		    </div>
		    @endif		
		</div>
		<div class="col-sm-4">	
		    <!-- Unit -->
		    @if( $errors->first('unit'))
		    <div class = "form-group has-error">
		      {{ Form::text('unit', '',array(
		      'class'=>"form-control input-sm",
		      'placeholder' => "Unit")) }}      
		      <p class="text-danger" role="alert">{{$errors->first('unit')}}</p>
		    </div>
		    @else
		    <div class = "form-group">
		      {{ Form::text('unit', '',array(
		      'class'=>"form-control  input-sm",
		      'placeholder' => "Unit" )) }}
		    </div>
		    @endif	
		</div>
	</div>
    {{ Form::hidden('id' , $recipe->id)}}
    {{Form::submit('Add ingredient', array('class' => "btn btn-primary btn-sm btn-block"))}}      
{{ Form::close()}}
@endif
@endif          