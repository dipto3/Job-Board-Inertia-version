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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Icons</a></li>
                                    <li class="breadcrumb-item active">Basic Inputs</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Candidate Information</h4>
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
                                        <form class="form-horizontal">

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" id="simpleinput"
                                                        class="form-control" value="{{ $candidate->name }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Email</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="category" id="simpleinput"
                                                        class="form-control" value="{{ $candidate->email }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-date">Joined
                                                    on</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-date" name="published"
                                                        value="{{ \Carbon\Carbon::parse($candidate->created_at)->format('d F, Y (l)') }}"
                                                        readonly>
                                                </div>
                                            </div>



                                            {{-- <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="status"
                                                        value="{{ $job->status == 1 ? 'Active' : 'Inactive' }}" readonly>
                                                </div>
                                            </div> --}}



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
