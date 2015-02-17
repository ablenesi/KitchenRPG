@if(Auth::check())
<br/>
{{ Form::open(['route' => 'comments.store']) }}
	<!-- Description -->
    @if( $errors->first('comment') )
      <div class = "form-group has-error">
        {{ Form::textarea('comment', '',array(
        'class'=>"form-control  input-sm",
        'placeholder' => "Write your ideas about this recipe here.",
        'rows' => 4 )) }}
        <p class="text-danger" role="alert">{{$errors->first('comment')}}</p>
      </div>
    @else
      <div class = "form-group">
        {{ Form::textarea('comment', '',array(
        'class'=>"form-control  input-sm",
        'placeholder' => "Write your ideas about this recipe here.",
        'rows' => 4 )) }}
      </div>
    @endif
    
    {{ Form::hidden('id' , $recipe->id)}}    
    {{Form::submit('Add your comment', array('class' => "btn btn-warning btn-sm btn-block"))}}    
{{ Form::close()}}     
@endif