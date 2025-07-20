<!DOCTYPE html>
<html lang="en">

<head>
   @include('partials.head')

  
    <title>@yield('title', 'IMS Dashboard')</title>

</head>

<body>

    <div class="wrapper">

        <!-- Start Sidebar -->
       @include('partials.sidebar')
        <!-- End Sidebar -->

        <!-- Start Page Content here -->
        <div class="page-content">

            <!-- Topbar Start -->
       @include('partials.navbar')
            <!-- Topbar End -->

<main class="main-content">
    <!-- Start Content-->
<div class="container-fluid">

             @yield('content')
</div>
</main>
            <!-- Footer Start -->
    @include('partials.footer')
            <!-- Footer End -->

        </div>
        <!-- End Page content -->

    </div>

    
    @push('scripts')
        @include('partials.scripts')
    @endpush

</body>

</html>