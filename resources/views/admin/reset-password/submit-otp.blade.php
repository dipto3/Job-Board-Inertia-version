<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
                                        <a href="">
                                            <img src="" alt="" height="30">
                                        </a>
                                    </div>
                                    <strong>
                                        <p style="color: red;" class="text-uppercase mb-1 mt-4">After 10 minutes, the
                                            OTP
                                            will expire.</p>
                                    </strong>
                                    <p class="mb-0"></p>
                                </div>

                                <div class="account-content mt-4">
                                    <form class="form-horizontal" action="{{ route('check.otp') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="email" required value="{{ $email }}">


                                        <div class="form-group row">

                                            <div class="col-12">
                                                <label for="emailaddress">Enter OTP</label>
                                                <input class="form-control" type="text" name="token" required
                                                    placeholder="12345">
                                            </div>
                                        </div>

                                        <div class="form-group row text-center mt-2">
                                            <div class="col-12">
                                                <button
                                                    class="btn btn-md btn-block btn-primary waves-effect waves-light"
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    @include('admin.partials.assets.js')
</body>

</html>
