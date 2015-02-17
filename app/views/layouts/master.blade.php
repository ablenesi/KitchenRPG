<html>
  <head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scali=1"/>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material css -->
  <!--
  <link href="/css/ripples.min.css" rel="stylesheet">
  <link href="/css/material.css" rel="stylesheet">
  -->
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
            </ul>
            @if(Auth::check())              
              <ul class="nav navbar-nav navbar-right">              
                <li>{{ link_to('users/'.Auth::user()->id, Auth::user()->first_name.'\'s Profile' ) }}</li>  
                <li>{{ link_to('logout', 'Logout ') }}</li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <img id="user_image" src={{Auth::user()->image_url}}> 
              </ul>
            @else
              <ul class="nav navbar-nav navbar-right">                            
                <li>{{link_to("/login","Login")}}</li>
                <li>{{link_to("/register","Register")}}</li>
              </ul>
            @endif
            
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
      <div class = "container no-print">
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
