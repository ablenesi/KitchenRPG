@extends('layouts.master')

@section('content')
    <h1>All users</h1>
    @if($users->isEmpty())
      <h3>No users registered yet ...</h3>
    @else
      @foreach ($users as $user)
        <li>{{link_to("/users/{$user->id}",$user->full_name)}}</li>
      @endforeach
    @endif
@stop
