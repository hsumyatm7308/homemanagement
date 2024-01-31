@include('layouts.adminheader')
<body>
  <!-- partial:index.partial.html -->
  <div class="bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600 h-screen flex overflow-hidden text-sm">
    {{-- left nav bar  --}}
    @include('layouts/adminleftnavbar')

    <div class="flex-grow overflow-hidden h-full flex flex-col">


      <!--top nav  -->
      @yield('usercontent')

     
    </div>
  </div>
  <!-- partial -->

  @include('layouts.adminfooter')

</body>

</html>