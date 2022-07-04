<!doctype html>
<html lang="en">
{{-- head --}}
    @include('template/head')

  <body id="page-top">
    {{-- navbar --}}
    @include('artikel/template/navbar')

    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
      @include('artikel/template/footer')

    <!-- Scroll to Top Button-->
    @include('template/button-topbar')

   {{-- logout --}}
   @include('template/logout-modal')
  
   {{-- javascript --}}
   @include('template/javascript')
  </body>
  
</html>