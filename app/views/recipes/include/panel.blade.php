{{-- basic recipe panel --}}
<div class="menu-category list-group">
  <div class="panel panel-info ">
    <div class="panel-header">
      <img class="img-thumbnail" src={{$recipe->image_url}}/>
    </div>
      <div class="panel-body">
        <h3>{{link_to("/recipes/{$recipe->id}",$recipe->title)}}</h3>
        <p>{{ implode(' ', array_slice(explode(' ', $recipe->description), 0, 25))}} ...</p><br/>

        <ul class="list-inline">
          <li title="done in">
            <p class= "icon-text mdi-device-access-time"> {{floor(($recipe->prep_time+$recipe->cook_time) / 60) }}' {{($recipe->prep_time+$recipe->cook_time) % 60 }}" |</p>
          </li>
          <li title="serves">
            <p class= "icon-text icon mdi-social-group"> {{$recipe->serves}} |</p>
          </li>
          <li title="comments">
            <p class= "icon-text icon mdi-communication-chat"> {{$recipe->comment_count}} |</p>
          </li>
          <li  title="follows">
            <p class= "icon-text icon mdi-action-favorite"> {{$recipe->follow_count}}</p>
          </li>
        </ul>
      </div>
  </div>
</div>