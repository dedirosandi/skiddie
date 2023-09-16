@extends('backend.index')
@section('title', 'Password Manager | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>File Manager Skiddie</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                File Manager
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="/dashboard/filemanager/create" class="btn btn-sm btn-success"> Upload New File</a>
                </div>
            </div>
        </div>

        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">File Manager</h4>
            </div>
            <div class="pb-20">
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Title</th>
                            <th class="">Url Login</th>
                            <th class="">Username/Email</th>
                            <th class="">Password</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($passwordmanagers as $password)
                            <tr>
                                <td>{{ $password->title }}</td>
                                <td>{{ $password->url }}</td>
                                <td>{{ $password->username_email }}</td>
                                <td>{{ $password->password }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Simple Datatable End -->
    </div>

@endsection
