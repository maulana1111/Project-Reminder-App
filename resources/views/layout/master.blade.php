<!-- Head -->
@include('component.head')
  <body>

    <!-- nav -->
    @include('component.nav')

    <div class="body">
      <div class="left">

        @yield('content')

      </div>


      <div class="right">
        <!-- right side -->
        @include('component.right_side')
      </div>
    </div>


    <!-- Script -->
    @include('component.script')

  </body>
</html>