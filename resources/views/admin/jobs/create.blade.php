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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Create</a></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Job</h4>
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
                                        <form class="form-horizontal" action="{{ route('job.store') }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" id="simpleinput"
                                                        class="form-control" placeholder="Job title"
                                                        value="{{ old('title') }}">
                                                    @error('title')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Category</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="category_id">
                                                        <option>Select</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('category_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-placeholder">Tags</label>
                                                <div class="col-md-10">
                                                    <input type="text" data-role="tagsinput" name="tags[]"
                                                        id="example-placeholder" class="form-control" placeholder="Job tags"
                                                        value="{{ old('tags') ? implode(',', old('tags')) : '' }}">
                                                    @error('tags')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-placeholder">Location</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="location" id="example-placeholder"
                                                        class="form-control" placeholder="Location"
                                                        value="{{ old('location') }}">
                                                    @error('location')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-number">salary</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-number" type="text"
                                                        name="salary" placeholder="10000-20000 BDT."
                                                        value="{{ old('salary') }}">
                                                    @error('salary')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-number">Experience</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-number" type="number"
                                                        name="experience" placeholder="1-2 years"
                                                        value="{{ old('experience') }}">
                                                    @error('experience')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Employment Type</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="employment_type">
                                                        <option>Select</option>
                                                        <option value="fulltime">Full-Time</option>
                                                        <option value="parttime">Part-Time</option>
                                                        <option value="freelance">Freelance</option>
                                                    </select>
                                                    @error('employment_type')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror

                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Gender</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="gender">
                                                        <option>Select</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="any">Any</option>
                                                    </select>
                                                    @error('gender')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-date">Published
                                                    on</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-date" type="date"
                                                        name="published" value="{{ old('published') }}">
                                                    @error('published')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="example-date">Deadline</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" id="example-date" type="date"
                                                        name="deadline" value="{{ old('deadline') }}">

                                                    @error('deadline')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Application Link</label>
                                                <div class="col-md-10">
                                                    <input placeholder="URL" class="form-control" type="url"
                                                        name="link" value="{{ old('link') }}">
                                                    @error('link')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                    @error('status')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-textarea">Description</label>
                                                <div class="col-md-10  ">
                                                    <textarea class="form-control summernote" name="description" rows="5" id="example-textarea">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
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
