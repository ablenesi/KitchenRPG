@extends('layouts.form')

@section('form')

<!-- LOGIN USER FORM -->
<div class="panel panel-default">  
  <div class="panel-body">
    {{ Form::open(['route'=>'sessions.store']) }}

    <!-- EMAIL -->
    
    <div class = "form-group">
      {{ Form::email('email', '',array(
      'class'=>"form-control floating-label input-lg",
      'placeholder' => "Email" )) }}
    </div>
   

    <!-- PASSWORD -->
   
    <div class = "form-group">
      {{ Form::password('password',array(
      'class'=>"form-control floating-label input-lg",
      'placeholder' => "Password"
      )) }}
    </div>
    
    @if(null !==Session::get('error'))
      <p class="text-danger" role="alert">{{Session::get('error')}}</p>
    @endif

    <!-- SUBMIT -->    
    {{Form::submit('Login', array('class' => "btn btn-info btn-lg", 'style' => "width: 100%"))}}
    
    {{ Form::close() }}
  </div>
</div>
@stop
