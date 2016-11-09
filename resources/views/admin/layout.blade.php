<!DOCTYPE html>

<html>
  <head>

    <title>Ruberoo - @yield('title')</title>
    @include('master.head')

  </head>
  <body class="">
    <!-- Site wrapper -->
      
        @include('master.header')

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <div class="content">
        
        @yield('content')

      </div>
      
      <!-- =============================================== -->
      

    <!-- ./wrapper -->
    
      @include('master.footer')
    

  </body>
</html>