
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>@yield('title', 'webDev blog')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  </head>

  <body>
      
      @include('front.partials.navigation')

    

    <div class="container">

     @yield('header')
        
      <div class="row">

          <!-- LEFT SIDE -->
        <div class="col-sm-8 blog-main">

          @yield('content')
         
        </div><!-- /.blog-main -->

        <!-- RIGHT SIDE -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
         @include('front.partials.sidebar')
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
  </body>
</html>
