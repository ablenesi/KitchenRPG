{{-- basic user row --}}
<div class="list-group-item">
<div class="media">
  <div class="media-left">
    <a href={{"users/".$user->id}}>
      <img class="media-object" src={{{$user->image_url}}} alt={{{$user->full_name}}}>
    </a>
  </div>
  <div class="media-body">
    <a href={{"users/".$user->id}}>
      <h4 class="media-heading">{{{$user->full_name}}}</h4>
    </a>
    <ul class="list-inline">
          <li title="recipes">
            <p>Recipes {{$user->recipes()->count()}} |</p>
          </li>
          <li title="comments">
            <p>Comments {{$user->comments()->count()}}</p>
          </li>          
        </ul>
    <p class="list-group-item-text"> {{{$user->description}}}</p>
  </div>
</div>  
</div>
<div class="list-group-separator"></div>