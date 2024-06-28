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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                    <li class="breadcrumb-item active">Company</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Company List</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                        <div class="card-box table-responsive">

                            <table id="datatable" class="table table-bordered  dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Account Status</th>
                                        <th>Approve Account</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="align-middle">{{ $user->id }}</td>
                                            <td class="align-middle">{{ $user->name }}</td>
                                            <td class="align-middle">{{ $user->email }}</td>
                                            <td class="align-middle">{{ $user->companyInfo->approval }}</td>
                                            <td>
                                                <form style="margin:0; padding:0; decoration:none; background:none"
                                                    method="post"
                                                    action="{{ route('update.active.account', ['encryptedUserId' => encrypt($user->companyInfo->id)]) }}">
                                                    @csrf
                                                    <button type="submit" style=""
                                                        class="btn btn-{{ $user->companyInfo->approval == 'pending' ? 'danger' : 'primary' }}">
                                                        {{ $user->companyInfo->approval == 'pending' ? 'Approve' : 'Approved' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="button-list col-md-3">
                                                        <a href="{{ route('company.details', $user->id) }}"
                                                            class="btn btn-icon waves-effect btn-secondary btn-sm"><i
                                                                style="font-size: 14px;" class="far fa-eye"></i> </a>

                                                    </div>
                                                    <div class="button-list col-md-3 ml-1">
                                                        <a href="">
                                                            <button type="button"
                                                                class="btn btn-icon waves-effect btn-secondary btn-sm"><i
                                                                    style="font-size: 14px;" class="fas fa-edit"></i>
                                                            </button></a>

                                                    </div>
                                                    <div class="button-list col-md-2 ml-1">
                                                        <form action="" method="post">
                                                            @csrf
                                                            @method('delete')

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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
