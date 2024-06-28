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
                                <div class="col-12">
                                    <div>
                                        <form class="form-horizontal" action="{{ route('job.update', $job->id) }}"
                                            method="post">
                                            @method('put')
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" id="simpleinput"
                                                        class="form-control" value="{{ $job->title }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Category</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="category">
                                                        <option value="{{ $job->category_id }}">{{ $job->category->name }}
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-placeholder">Tags</label>
                                                <div class="col-md-10">
                                                    <input type="text" data-role="tagsinput" name="tags[]"
                                                        id="example-placeholder" class="form-control"
                                                        value="{{ $job->tags }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-placeholder">Location</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="location" id="example-placeholder"
                                                        class="form-control" value="{{ $job->location }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-number">salary</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-number" type=""
                                                        name="salary" value="{{ $job->salary }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-number">Experience</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-number" type="number"
                                                        name="experience"value="{{ $job->experience }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Employment Type</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="employment_type">
                                                        <option>{{ $job->employment_type }}</option>
                                                        <option value="fulltime">Full-Time</option>
                                                        <option value="parttime">Part-Time</option>
                                                        <option value="freelance">Freelance</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Gender</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="gender">
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
                                                        type="date"
                                                        value="{{ \Carbon\Carbon::parse($job->published)->format('Y-m-d') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-date">Deadline</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="date" id="example-date"
                                                        name="deadline"
                                                        value="{{ \Carbon\Carbon::parse($job->deadline)->format('Y-m-d') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Application Link</label>
                                                <div class="col-md-10">
                                                    <input placeholder="URL" class="form-control" type="url"
                                                        name="link" value="{{ $job->link }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="status">
                                                        <option value="1">{{ $job->status }}</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-textarea">Description</label>
                                                <div class="col-md-10  ">
                                                    <textarea class="form-control summernote" name="description" rows="5" id="example-textarea">{{ $job->description }}</textarea>
                                                </div>
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
