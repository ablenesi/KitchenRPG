@extends('layouts.master')

@section('content')
    <h1>All users</h1>
    @if($users->isEmpty())
      <h3>No users registered yet ...</h3>
    @else
    <div class = "row">
    	<div class = "col-lg-12">
      		<div class="panel panel-basic">        		
        		<div class="panel-body">
		          	<div class="list-group">
			            @foreach ($users as $user)
		        			@include('users.include.row')
		      			@endforeach
		          	</div>
        		</div>
      		</div>
    	</div>
  	</div>
    @endif
@stop
