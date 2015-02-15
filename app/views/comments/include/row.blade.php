{{-- basic comment row --}}
<div class="list-group-item">
  <div class="row-action-primary image">
    <img class="img-thumbnail" src={{$comment->user->image_url}}/>
  </div>
  <div class="row-content">
    <div class="least-content">{{$comment->created_at}}</div>
    <h3 class="list-group-item-heading"> {{$comment->user->full_name}}'s comment: </h3>
    <p class="list-group-item-text"> {{$comment->comment}} </p>
  </div>
</div>
<div class="list-group-separator"></div>