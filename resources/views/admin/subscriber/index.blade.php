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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Subscriber</a></li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Subscriber List</h4>

                        </div>

                    </div>

                </div>

                <!-- end page title -->

                <div class="row">

                    <div class="col-12">


                        <div class="card-box table-responsive">


                            <table id="datatable" class="table table-bordered  dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Subscriber Email</th>
                                        @can('delete-subscriber')
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($subscribers as $key => $subscriber)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $subscriber->category->name }}</td>
                                            <td>{{ $subscriber->email }}</td>
                                            @can('delete-subscriber')
                                                <td>
                                                    <div class="row">
                                                        <div class="button-list col-md-2 ml-1">
                                                            <form action="" method="post">
                                                                {{-- @csrf
                                                            @method('delete') --}}

                                                                <button type="submit"
                                                                    class="btn btn-icon waves-effect btn-secondary show-alert-delete-box btn-sm"
                                                                    data-toggle="tooltip" title='Delete'><i
                                                                        style="font-size: 14px; " class="fas fa-trash"></i>
                                                                </button>

                                                            </form>

                                                            {{-- </div> --}}
                                                            {{-- <div class="col-sm-6 col-lg-4 col-xl-3">
                                                    <i class="fas fa-edit"></i>
                                                </div> --}}
                                                        </div>

                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        2017 - 2019 &copy; Adminox theme by <a href="#">Coderthemes</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.show-alert-delete-box', function(event) {
                var form = $(this).closest("form");

                event.preventDefault();
                swal({
                    title: "Are you sure you want to delete this record?",
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    type: "warning",
                    buttons: ["Cancel", "Yes!"],
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
