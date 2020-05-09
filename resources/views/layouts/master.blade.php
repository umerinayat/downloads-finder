<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('page-title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">
  <link href="{{asset('css/blog-post.css')}}" rel="stylesheet">

  @yield('extra-head')

</head>

<body>

  <!-- NAVBAR -->
  @include('partials.navbar')

  <!-- Top Menu Bar Widget -->
  @include('partials.widgets.top-menu-bar')

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <main>
            @yield('main-content')
        </main>
      </div>

      <!-- Sidebar Widgets Column -->
      @include('partials.left-sidebar')

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- FOOTER -->
  @include('partials.footer')
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  @yield('extra-script')

</body>

</html>
