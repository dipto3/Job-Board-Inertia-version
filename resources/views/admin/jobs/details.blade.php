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
                            <h4 class="page-title">Details Job</h4>
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
                                                <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" id="simpleinput"
                                                        class="form-control" value="{{ $job->title }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Category</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="category" id="simpleinput"
                                                        class="form-control" value="{{ $job->category->name }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-placeholder">Tags</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="tags[]" id="example-placeholder"
                                                        class="form-control" value="{{ $job->tags }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-placeholder">Total
                                                    view</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="tags[]" id="example-placeholder"
                                                        class="form-control" value="{{ $job->jobView->count() }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-placeholder">

                                                    Apply Button's total Click</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="tags[]" id="example-placeholder"
                                                        class="form-control" value="{{ $job->jobApply->count() }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-placeholder">Location</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="location" id="example-placeholder"
                                                        class="form-control" value="{{ $job->location }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-number">salary</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-number" type="text"
                                                        name="salary" value="{{ $job->salary }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-number">Experience</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-number" type="number"
                                                        name="experience" value="{{ $job->experience }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Employment Type</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="employment_type" readonly>
                                                        <option>{{ $job->employment_type }}</option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Gender</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="gender" readonly>
                                                        <option>{{ $job->gender }}</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="any">Any</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-date">Published
                                                    on</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-date" name="published"
                                                        value="{{ \Carbon\Carbon::parse($job->published)->format('d F, Y (l)') }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-date">Deadline</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-date" name="deadline"
                                                        value="{{ \Carbon\Carbon::parse($job->deadline)->format('d F, Y (l)') }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Application Link</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="link"
                                                        value="{{ $job->link }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="status"
                                                        value="{{ $job->status == 1 ? 'Active' : 'Inactive' }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-textarea">Description</label>
                                                <div class="col-md-10">

                                                    <p class="form-control">{!! $job->description !!}</p>

                                                </div>
                                            </div>

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
