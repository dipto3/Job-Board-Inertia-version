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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Job</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Job</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <form class="form-horizontal" action="{{ route('role.update', $role->id) }}"
                                            method="post">
                                            @method('put')
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name" id="simpleinput"
                                                        class="form-control" value="{{ $role->name }}"
                                                        placeholder="Role name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Permissions</label>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkPermissionAll">
                                                    <label class="form-check-label" for="checkPermissionAll">All</label>
                                                </div>
                                                <hr>
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="permissions[]"
                                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                            id="checkPermission{{ $permission->id }}"
                                                            value="{{ $permission->name }}">
                                                        <label class="form-check-label"
                                                            for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <button style="float: right;color:white;" type="submit"
                                                class="btn btn-success waves-effect waves-light">Submit</button>
                                        </form>

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
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#checkPermissionAll").click(function() {

            if ($(this).is(':checked')) {
                // check all the checkbox
                $('input[type=checkbox]').prop('checked', true);
            } else {
                // un check all the checkbox
                $('input[type=checkbox]').prop('checked', false);
            }
        });
    </script>
@endpush
