@extends('admin.layouts.master')
@section('admin.content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Role</a></li>
                                    <li class="breadcrumb-item active">Roles</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Role's Permission List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <h4>{{ $roles->name }}</h4>

                                        <ul>
                                            @forelse ($roles->permissions as $permission)
                                                <li class="">{{ $permission->name }}</li>
                                            @empty
                                                <Strong style="color: rgb(173, 21, 21);">
                                                    No permissions found for this role.</Strong>
                                            @endforelse
                                        </ul>

                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                        </div> <!-- end card-box -->
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->

    </div>
@endsection
