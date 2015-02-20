@if(is_null($user->description))
  @if(Auth::check())
    @if(Auth::user()->id)
      {{ Form::open(array(
        'method' => 'PUT', 
        'route' => 'users.update',
        'id' => 'form-add-description')) 
      }}
          @if( $errors->first('description') )
            <div class = "form-group has-error">
              {{ Form::textarea('description', '',array(
                    'id' => "description",
                    'class'=>"form-control  input-sm",
                    'placeholder' => "Write your ideas about this recipe here.",
                    'rows' => 4 )) 
              }}              
              <p class="text-danger" role="alert">{{$errors->first('description')}}</p>
              {{Form::submit('Add your description', array(
                'id' => "btn-add-description",
                'class' => "btn btn-danger btn-sm btn-block"))
              }}
            </div>
          @else
            <div class = "form-group">
              {{ Form::textarea('description', '',array(
                    'id' => "description",
                    'class'=>"form-control  input-sm",
                    'placeholder' => "Write your ideas about yourself here.",
                    'rows' => 4 )) 
              }}
              {{Form::submit('Add your description', array(
                'id' => "btn-add-description",
                'class' => "btn btn-success btn-sm btn-block"))
          }}
            </div>

          @endif
      {{ Form::close()}}
      {{-- Including the javascript witch makes the AJAX call --}}
      <script src="/js/users/description.js"></script>               
    @endif
  @endif
@else
<p>{{{ $user->description }}}</p>
@endif