@if(Auth::check())
@if(Auth::user()->id == $recipe->user->id)
<br/>
{{ Form::open(['route' => 'steps.store']) }}
	<!-- Description -->
    @if( $errors->first('description') )
    <div class = "form-group has-error">
      {{ Form::textarea('description', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Describe your recipe here",
      'rows' => 4 )) }}
      <p class="text-danger" role="alert">{{$errors->first('description')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::textarea('description', '',array(
      'class'=>"form-control",
      'placeholder' => "Descriptibe your new step here",
      'rows' => 4 )) }}
    </div>
    @endif
    {{ Form::hidden('nr' , $recipe->steps->count())}}
    {{ Form::hidden('id' , $recipe->id)}}    
    {{Form::submit('Add step', array('class' => "btn btn-success btn-sm btn-block"))}}      
{{ Form::close()}}
@endif          
@endif