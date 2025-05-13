<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>404 Page </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

    <body class="bg-white">
        
        <!-- Begin page -->
        <div class="maintenance-pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <div class="mb-5 text-center">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('backend/assets/images/logo-dark.png')}}" alt="logo-dark" class="mx-auto" height="28" />
                                </a>
                            </div>
    
                            <div class="maintenance-img">
                                <img src="{{ asset('backend/assets/images/svg/404-error.svg')}}" class="img-fluid" alt="coming-soon">
                            </div>
                            
                            <div class="text-center">
                                <h3 class="mt-5 fw-semibold text-black text-capitalize">Oops!, Page Not Found</h3>
                                <p class="text-muted">This pages you are trying to access does not exits or has been moved. <br> Try going back to our homepage.</p>
                            </div>

                            <a class="btn btn-primary mt-3 me-1" href="{{ route('dashboard') }}">Back to Home</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js')}}"></script>

        <!-- App js-->
        <script src="{{ asset('backend/assets/js/app.js')}}"></script>
        
    </body>
</html>