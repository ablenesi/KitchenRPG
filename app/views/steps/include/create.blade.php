{{-- Basic form for creating new step to recipe --}}
@if(Auth::check())
  @if(Auth::user()->id == $recipe->user->id)
    <br/>
    {{ Form::open(array(
            'route' => 'steps.store',
            'id' => 'form-add-step',
            'class' => 'no-print'
          ))
       }}
        {{ Form::hidden('nr' , $recipe->steps->count())}}
        {{ Form::hidden('id' , $recipe->id)}}    
        
        @if( $errors->first('description') )
          <div class = "form-group has-error">
            {{ Form::textarea('description', '',array(
            'id' => 'description',
            'class'=>"form-control  input-lg",
            'placeholder' => "Describe your recipe here",
            'rows' => 4 )) }}
            <p class="text-danger" role="alert">{{$errors->first('description')}}</p>
          </div>
          {{Form::submit('Add step', array(
            'id' => "btn-add-step",
            'class' => "btn btn-danger btn-sm btn-block"))}}      
        @else
          <div class = "form-group">
            {{ Form::textarea('description', '',array(
              'id' => 'description',
              'class'=>"form-control",
              'placeholder' => "Descriptibe your new step here",
              'rows' => 4 )) }}
          </div>
          {{Form::submit('Add step', array(
              'id' => "btn-add-step",
              'class' => "btn btn-success btn-sm btn-block"))}}      
          @endif

    {{ Form::close()}}
    <script src="/js/recipes/step.js"></script>
  @endif          
@endif