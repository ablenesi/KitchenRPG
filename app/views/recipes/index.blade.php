@extends('layouts.master')

@section('content')
  <h1>All recipes</h1>
  @if($recipes->isEmpty())
    <h3>No recipes uploaded yet ...</h3>
    @else
      <div class="row row-recipes menu">
        @foreach ($recipes as $recipe)
        @include('recipes.include.panel')
      @endforeach
    </div>
    </ul>
   @endif
@stop
