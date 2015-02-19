@if(is_null($user->description))
  @if(Auth::check())
    @if(Auth::user()->id)
      {{ Form::open(['route' => 'users.update']) }}
        <!-- User Description -->
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
              'placeholder' => "Write your ideas about yourself here.",
              'rows' => 4 )) }}
            </div>
          @endif
          
          {{Form::submit('Add your description', array('class' => "btn btn-success btn-sm btn-block"))}}    
      {{ Form::close()}}                   
    @endif
  @endif
@else
<p>{{{ $user->description }}}</p>
@endif