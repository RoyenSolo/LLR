<!DOCTYPE html>
<html lang="en">

  @include('partials._head')

  <body>

    @include('partials._nav')

    <div class="container">

      @include('partials._messages')

      <div class="row">
        <div class="col-md-1 col-md-offset-2">
          <i class="fas fa-atom fa-2x"></i>
        </div>
      </div>

      @yield('content')

    </div><!--end of container-->

    @include('partials._footer')

    @include('partials._javascript')

    @yield('scripts')

  </body>

</html>
