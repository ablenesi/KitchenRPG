{{-- basic step row --}}
<div class="list-group-item">
  <div class="row-action-primary image">   
    <img class="img-thumbnail" src="http://lorempixel.com/200/200/food"/>
  </div>
  <div class="row-content">
  	<h3 class="list-group-item-heading"> {{$step->number+1}}. </h3>
    <p class="list-group-item-text"> {{$step->description}} </p>
  </div>
</div>
<div class="list-group-separator"></div>