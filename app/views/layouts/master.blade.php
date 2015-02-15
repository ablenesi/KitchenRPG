<html>
  <head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scali=1"/>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/ripples.min.css" rel="stylesheet">
  <link href="/css/material.css" rel="stylesheet">
  <link rel= "stylesheet" href="/css/style.css"/>
  <title>KitcheRPG</title>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="navbar navbar-default">
          <div class="navbar-header">
            <a class="navbar-brand" href="/">KitchenRPG</a>
          </div>
          <div class="navbar-collapse collapse navbar-responsive-collapse">

            <ul class="nav navbar-nav">
              <li><a href="/recipes">Recipes</a></li>
              <li><a href="/users">Users</a></li>
              <li>
                {{ Form::open(array('class'=>'navbar-form navbar-left')) }}
                {{ Form::text('search','Search',array('class'=>'form-control col-lg-8')) }}
                {{ Form::close() }}
              </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <li>{{link_to("/users/create","Login")}}</li>
            </ul>
          </div>
        </div>
        <div class="pull-right">
          @yield('header-right')
        </div>
      </div>
    </header>

    <div class="container">
      <div class="content">
        @yield('content')
      </div>
    </div>


    <footer>
      <div class = "container">
        <p> All rights reserved © 2015 KitchenRPG </p>
      </div>
    </footer>
    <!-- Your site ends -->

    <script src="/js/jquery-1.11.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <script src="/js/ripples.min.js"></script>
    <script src="/js/material.min.js"></script>
    <script>
    $(document).ready(function() {
      $.material.init();
    });
    </script>
  </body>
</html>
