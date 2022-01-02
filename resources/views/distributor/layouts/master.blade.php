<!DOCTYPE html>
<html lang="en">

@include('distributor.layouts.head')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    @include('sweetalert::alert')


    <!-- Sidebar -->
    @include('distributor.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('distributor.layouts.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('main-content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @include('distributor.layouts.footer')

</body>

</html>
