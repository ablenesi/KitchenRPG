@extends('layouts.master')

@section('content')
<div class="panel panel-info ">
  <div class="panel-header">
    <img class="img-thumbnail" src={{$recipe->image_url}}/>
  </div>
  <div class="panel-body">
    <div class = "content">
      <div class = "row">
        <div class = "col-lg-4">
          <img class="img-circle img-thumbnail" src={{$recipe->user->image_url}}/>
        </div>
        <div class = "col-lg-8">
          <h1>{{ $recipe->title }}</h1>
          <h3>{{ $recipe->user->full_name}}'s recipe</h3>
          <p class="icon-text mdi-device-access-time"> uploaded:  {{ $recipe->created_at }}</p>
          <br/>
          <p>{{ $recipe->description }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class = "content">
  <div class = "row">

    <div class = "col-lg-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3> Ingredients / {{ $recipe->serves }} serving </h3>
        </div>
        <div class="panel-body">

          @foreach($recipe->ingredients as $ingredient)
          <div class="list-group-item">
            <h4 class="list-group-item-heading mdi-toggle-check-box-outline-blank"> {{$ingredient->quantity}} {{$ingredient->unit}} {{$ingredient->name}}</h4>
          </div>
          @endforeach
          <br/>
          <div class="form-group">
            <input class="form-control floating-label" id="focusedInput" type="text" placeholder="Enter servings number">
            <button type="submit" class="btn btn-primary strech">Add selected to shopping list</button>
          </div>
        </div>
      </div>

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3> Additional information </h3>
        </div>

        <div class="panel-body">
          <div class "list-group">
            <div class="list-group-item">
              <h4 class="list-group-item-heading mdi-device-access-time"> Preparation time {{floor($recipe->prep_time / 60)}}' {{$recipe->prep_time % 60}}"</h4>
            </div>

            <div class="list-group-item">
              <h4 class="list-group-item-heading mdi-device-access-time"> Cook time: {{floor($recipe->cook_time/60)}}' {{$recipe->cooktime%60}}"</h4>
            </div>

            <div class="list-group-item active">
              <h4 class="list-group-item-heading mdi-device-access-time"><b> Done in: {{floor(($recipe->prep_time+$recipe->cook_time) / 60) }}' {{($recipe->prep_time+$recipe->cook_time) % 60 }}"</b></h4>
            </div>

            <div class="list-group-item">
              <h4 class="list-group-item-heading mdi-communication-chat"> Comment count: {{$recipe->comment_count}}</h4>
            </div>

            <div class="list-group-item">
              <h4 class="list-group-item-heading mdi-action-favorite"> Follower count: {{$recipe->follow_count}}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class = "col-lg-8">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3> Steps: </h3>
        </div>
        <div class="panel-body">
          <div class="list-group">
            @foreach($recipe->steps as $step)
              @include('steps.include.row')
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class = "row">
    <div class = "col-lg-12">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3> Comments: </h3>
        </div>
        <div class="panel-body">
          <div class="list-group">
            @foreach($recipe->comments as $comment)
              @include('comments.include.row')
            @endforeach
            <!-- FORM FOR IM-->
          </div>
        </div>
      </div>
    </div>
  </div>
@stop