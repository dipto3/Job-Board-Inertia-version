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
<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Header Start -->
        @include('admin.partials.header')
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        @include('admin.partials.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start Page Content here -->
        @yield('admin.content')
        <!-- End Page content -->
    </div>
    <!-- END wrapper -->
    <!-- Vendor js -->
    @include('admin.partials.assets.js')

</body>

</html>
