{{-- basic comment row --}}
<div class="list-group-item">
<div class="media"><p class="pull-right">{{{$comment->created_at->diffForHumans()}}}</p>
  <div class="media-left">
    <a href={{"/users/".$comment->user->id}}>
      <img class="media-object" src={{{$comment->user->image_url}}} alt={{{$comment->user->full_name}}}>
    </a>
    
  </div>
  <div class="media-body">
    
    <a href={{"/users/".$comment->user->id}}>
      <h4 class="media-heading">{{{ $comment->user->full_name }}}</h4>
    </a>
    <p class="list-group-item-text"> {{{ $comment->comment }}} </p>
    @if(Auth::check())
      @if(Auth::user()->admin == 1)
      <br/>
      {{ Form::open(array('route' => array('comments.destroy', $comment->id), 'method' => 'delete')) }}
        <button type="submit" href="{{ URL::route('comments.destroy', $comment->id) }}" class="btn btn-danger btn-sm">Delete comment</button>
      {{ Form::close()}}
      @endif
    @endif
  </div>
</div>  
</div>
<div class="list-group-separator"></div>