@extends('layouts.master')

@section('content')
<div class="panel panel-info ">
  <div class="panel-header">
    <img class="img-thumbnail" src="http://lorempixel.com/1200/400/food"/>
  </div>
  <div class="panel-body">
    <div class = "content">
      <div class = "row">
        <div class = "col-lg-4">
          <img class="img-circle img-thumbnail" src={{$user->image_url}}/>
        </div>
      <div class = "col-lg-8">
        <h1>{{ $user->full_name}}'s profile</h1>
        <p class="icon-text mdi-device-access-time"> Registered: </p>
        <p class="icon-text"> {{ $user->created_at->diffForHumans() }}</p>
        <p class="icon-text mdi-communication-email"> Email:</p>
        <p class="icon-text"> {{{ $user->email }}}</p>
        {{-- Manage description create if is null (whit ajax) --}}
        @include('users.include.description')
      </div>
    </div>
  </div>
  </div>
</div>

<h1>{{{ $user->first_name}}}'s Recipes</h1>
@if(Auth::check())
  @if(Auth::user()->id == $user->id)
    {{link_to("recipes/create","Add recipe",array('class'=>"btn btn-success"))}}
  @endif
@endif
@if($user->recipes->isEmpty())
  <h3>No recipes uploaded yet ...</h3>
@else
  <div class="row row-recipes menu">
  @foreach ($user->recipes as $recipe)
    @include('recipes.include.panel')
  @endforeach
@endif

@stop
