@extends('layouts.master')

@section('content')
<!-- REGISTER NEW USER FORM -->  
<div class="panel panel-success"> 
  <div class="panel-heading">
    <h3>Create your new recipe</h3>
  </div> 
  <div class="panel-body">
    {{ Form::open(['route' => 'recipes.store', 'files' => true]) }}

    <!-- Title -->
    @if( $errors->first('title'))
    <div class = "form-group has-error">
      {{ Form::text('title', '',array(
      'class'=>"form-control input-lg",
      'placeholder' => "Title")) }}      
      <p class="text-danger" role="alert">{{$errors->first('title')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::text('title', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Title" )) }}
    </div>
    @endif

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
      'placeholder' => "Descriptibe your recipe here",
      'rows' => 4 )) }}
    </div>
    @endif
    
    <!-- Serves -->
    @if( $errors->first('serves') )
    <div class = "form-group has-error">
      {{ Form::number('serves', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Serves" )) }}
      <p class="text-danger" role="alert">{{$errors->first('serves')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::number('serves', '',array(
      'class'=>"form-control  input-lg",
      'placeholder' => "Serves" )) }}
    </div>
    @endif

    <div class="row">      
      <div class="col-lg-6">
        <!-- Prep time (hours) -->
        @if( $errors->first('prep_time_hours') )
        <div class = "form-group has-error">
          {{ Form::number('prep_time_hours', '',array(
          'class'=>"form-control  input-lg",
          'placeholder' => "Prep time (hours)" )) }}
          <p class="text-danger" role="alert">{{$errors->first('prep_time_hours')}}</p>
        </div>
        @else
        <div class = "form-group">
          {{ Form::number('prep_time_hours', '',array(
          'class'=>"form-control  input-lg",
          'placeholder' => "Prep time (hours)" )) }}
        </div>
        @endif
      </div>
      <div class="col-lg-6">
         <!-- Prep time (minutes) -->
          @if( $errors->first('prep_time_minutes') )
          <div class = "form-group has-error">
            {{ Form::number('prep_time_minutes', '',array(
            'class'=>"form-control  input-lg",
            'placeholder' => "Prep time (minutes)" )) }}
            <p class="text-danger" role="alert">{{$errors->first('prep_time_minutes')}}</p>
          </div>
          @else
          <div class = "form-group">
            {{ Form::number('prep_time_minutes', '',array(
            'class'=>"form-control  input-lg",
            'placeholder' => "Prep time (minutes)" )) }}
          </div>
          @endif    
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <!-- Cook time (hours) -->
        @if( $errors->first('cook_time_hours') )
        <div class = "form-group has-error">
          {{ Form::number('cook_time_hours', '',array(
          'class'=>"form-control  input-lg",
          'placeholder' => "Cook time (hours)" )) }}
          <p class="text-danger" role="alert">{{$errors->first('cook_time_hours')}}</p>
        </div>
        @else
        <div class = "form-group">
          {{ Form::number('cook_time_hours', '',array(
          'class'=>"form-control  input-lg",
          'placeholder' => "Cook time (hours)" )) }}
        </div>
        @endif
      </div>
      <div class="col-lg-6">
         <!-- Cook time (minutes) -->
          @if( $errors->first('cook_time_minutes') )
          <div class = "form-group has-error">
            {{ Form::number('cook_time_minutes', '',array(
            'class'=>"form-control  input-lg",
            'placeholder' => "Cook time (minutes)" )) }}
            <p class="text-danger" role="alert">{{$errors->first('cook_time_minutes')}}</p>
          </div>
          @else
          <div class = "form-group">
            {{ Form::number('cook_time_minutes', '',array(
            'class'=>"form-control  input-lg",
            'placeholder' => "Cook time (minutes)" )) }}
          </div>
          @endif    
      </div>
    </div>
    
    <!-- Image Url
    @if( $errors->first('image_url') )
    <div class = "form-group has-error">
      {{ Form::file('image_url', '',array(
      'id'=>"img_input",
      'class'=>"form-control input-lg btn btn-success",
      'accept' => "image/*" )) }}
      <p class="text-danger" role="alert">{{$errors->first('image_url')}}</p>
    </div>
    @else
    <div class = "form-group">
      {{ Form::file('image_url', '',array(
      'class'=>"form-control  input-lg btn btn-success",
      'accept' => "image/*" )) }}
    </div>
    @endif    -->
    <!-- SUBMIT -->
    {{Form::submit('Create new recipe', array('class' => "btn btn-success btn-lg", 'style' => "width: 100%"))}}      
    {{ Form::close() }}
  </div>
@stop
