<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="admin dashboard template,admin panel html,bootstrap dashboard,admin dashboard,html template,template dashboard html,html css,bootstrap 5 admin template,bootstrap admin template,bootstrap 5 dashboard,admin panel html template,dashboard template bootstrap,admin dashboard html template,bootstrap admin panel,simple html template,admin dashboard bootstrap">
        
		<!-- TITLE -->
        <title> Valex - Laravel Bootstrap 5 Premium Admin & Dashboard Template </title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('build/assets/images/brand-logos/favicon.ico')}}">

        <!-- Main Theme Js -->
        <script src="{{asset('build/assets/main.js')}}"></script>

        <!-- ICONS CSS -->
        <link href="{{asset('build/assets/icon-fonts/icons.css')}}" rel="stylesheet">

        @include('layouts.components.styles')
      
        <!-- APP CSS & APP SCSS -->
        @vite(['resources/sass/app.scss'])

        @yield('styles')

    </head>

    <body class="">

        <!-- Switcher -->
        @include('layouts.components.switcher')
        <!-- End switcher -->

        <!-- Loader -->
        <div id="loader" >
            <img src="{{asset('build/assets/images/media/loader.svg')}}" alt="">
        </div>
        <!-- Loader -->

        <div class="page">

            <!-- Main-Header -->
            @include('layouts.components.main-header')
            <!-- End Main-Header -->

            <!-- Country-selector modal -->
            @include('layouts.components.modal')
            <!-- End Country-selector modal -->

            <!--Main-Sidebar-->
            @include('layouts.components.main-sidebar')
            <!-- End Main-Sidebar-->

            <!-- Start::app-content -->
            <div class="main-content app-content">
                <div class="container-fluid">

                    @yield('content')
                    
                </div>
            </div>
            <!-- End::content  -->

            <!-- Footer opened -->
            @include('layouts.components.footer')
            <!-- End Footer -->

            @yield('modals')  

        </div>

        <!-- SCRIPTS -->
        @include('layouts.components.scripts')

        <!-- Sticky JS -->
        <script src="{{asset('build/assets/sticky.js')}}"></script>

        <!-- Custom-Switcher JS -->
        @vite('resources/assets/js/custom-switcher.js')

        <!-- APP JS-->
		@vite('resources/js/app.js')       
        <!-- END SCRIPTS -->

    </body> 

</html>
