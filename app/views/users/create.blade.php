@extends('layouts.login')

@section('form')
<!-- REGISTER NEW USER FORM -->  
<div class="panel panel-default">  
  <div class="panel-body">
    {{ Form::open(['route' => 'users.store']) }}

    <!-- FIRST NAME -->
    @if( $errors->first('first_name') )
    <div class = "form-group has-error">
      {{ Form::text('first_name', '',array(
      'class'=>"form-control input-lg",
      'placeholder' => "First name")) }}      
      <p class="text-danger" role="alert">{{$errors->first('first_name')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::text('first_name', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "First name" )) }}
    </div>
    @endif

    <!-- LAST NAME -->
    @if( $errors->first('last_name') )
    <div class = "form-group has-error">
      {{ Form::text('last_name', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Last name" )) }}
      <p class="text-danger" role="alert">{{$errors->first('last_name')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::text('last_name', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Last name" )) }}
    </div>
    @endif

    <!-- EMAIL -->
    @if( $errors->first('email') )
    <div class = "form-group has-error">
      {{ Form::email('email', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Email" )) }}
      <p class="text-danger" role="alert">{{$errors->first('email')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::email('email', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Email"
      )) }}
    </div>
    @endif

    <!-- PASSWORD -->
    @if( $errors->first('password') )
    <div class = "form-group has-error">
      {{ Form::password('password',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Password" )) }}
      <p class="text-danger" role="alert">{{$errors->first('password')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::password('password',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Password"
      )) }}
    </div>
    @endif
    <!-- SUBMIT -->
    {{Form::submit('Register', array('class' => "btn btn-success btn-lg", 'style' => "width: 100%"))}}      
    {{ Form::close() }}
  </div>
@stop
