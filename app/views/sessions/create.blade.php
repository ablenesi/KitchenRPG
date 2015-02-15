@extends('layouts.master')

@section('content')

<!-- LOGIN USER FORM -->
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h2 >Login</h2>
      </div>
      <div class="panel-body">
        {{ Form::open(['route'=>'sessions.store']) }}

        <!-- EMAIL -->
        @if( $errors->first('email') )
        <div class = "form-group has-error">
          {{ Form::email('email', '',array(
          'class'=>"form-control floating-label input-lg",
          'placeholder' => $errors->first('email')
          )) }}
        </div>
        @else
        <div class = "form-group">
          {{ Form::email('email', '',array(
          'class'=>"form-control floating-label input-lg",
          'placeholder' => "Email"
          )) }}
        </div>
        @endif

        <!-- PASSWORD -->
        @if( $errors->first('password') )
        <div class = "form-group has-error">
          {{ Form::password('password',array(
          'class'=>"form-control floating-label input-lg",
          'placeholder' => $errors->first('password')
          )) }}
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
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-8">
            {{Form::submit('Login', array(
            'class' => "btn btn-info"
            ))}}
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@stop
