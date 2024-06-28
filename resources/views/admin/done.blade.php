<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        @include('admin.partials.assets.css')

    </head>

    <body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

       

        <div class="account-pages w-100 mt-5 mb-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mb-0">

                            <div class="card-body p-4">

                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <div class="text-center">
                                           
                                        </div>
                                    </div>

                                    <div class="account-content text-center mt-4">
                                        
                                            <h3 class="text-danger mt-3">Payment Completed!</h3>
                                            <a class="btn btn-md btn-block btn-primary waves-effect waves-light mt-20" href="{{ route('home') }}"> Return Home</a>
                                        </div>

                                    
                                </div>
                            </div>

                        </div>
                        <!-- end card-body -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        @include('admin.partials.assets.js')

    </body>
</html>