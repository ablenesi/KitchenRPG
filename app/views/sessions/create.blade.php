@extends('layouts.login')

@section('form')

<!-- LOGIN USER FORM -->
<div class="panel panel-default">  
  <div class="panel-body">
    {{ Form::open(['route'=>'sessions.store']) }}

    <!-- EMAIL -->
    @if( $errors->first('email') )
    <div class = "form-group has-error">
      {{ Form::email('email', '',array(
      'class'=>"form-control floating-label input-lg",
      'placeholder' => "Email" )) }}
      <p class="text-danger" role="alert">{{$errors->first('email')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::email('email', '',array(
      'class'=>"form-control floating-label input-lg",
      'placeholder' => "Email" )) }}
    </div>
    @endif

    <!-- PASSWORD -->
    @if( $errors->first('password') )
    <div class = "form-group has-error">
      {{ Form::password('password',array(
      'class'=>"form-control floating-label input-lg",
      'placeholder' => "Password" )) }}
      <p class="text-danger" role="alert">{{$errors->first('password')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::password('password',array(
      'class'=>"form-control floating-label input-lg",
      'placeholder' => "Password"
      )) }}
    </div>
    @endif

    <!-- SUBMIT -->    
    {{Form::submit('Login', array('class' => "btn btn-info btn-lg", 'style' => "width: 100%"))}}
    
    {{ Form::close() }}
  </div>
</div>
@stop
