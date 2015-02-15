@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Add a recipe</h3>
    </div>
    <div class="panel-body">
      <form action="{{ URL::route('createRecipe') }}" method='post'>
        <div class="form-group">
          <input name="title" class="form-control" type="text" placeholder="Title"/>
        </div>
        <div class="form-group">
          <textarea name="description" class="form-control" placeholder="Write description here." /></textarea>
        </div>
        <div class="form-group">
          <input name="serves" class="form-control" type="number" placeholder="Serves"/>
        </div>
        <div class="form-group">
          <input name="preptime" class="form-control" type="number" placeholder="Preparation time"/>
        </div>
        <div class="form-group">
          <input name="cooktime" class="form-control" type="number" placeholder="Cooking time"/>
        </div>
        <input type="submit" class="btn btn-primary"/>
      </form>
    </div>
  </div>
@stop
