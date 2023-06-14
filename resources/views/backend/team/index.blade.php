@extends('backend.index')
@section('title', 'Team | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>List Team Skiddie</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Team
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="/dashboard/team/create" class="btn btn-sm btn-success"> Add a New Team</a>
                </div>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Team of Skiddie ID</h4>
            </div>
            <div class="pb-20">
                <table class="data-table table">
                    <thead>
                        <tr>
                            <th class="datatable-nosort">Name</th>
                            <th class="datatable-nosort">As a</th>
                            <th class="datatable-nosort">Profile Picture</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->as }}</td>
                                <td><img width="50" class="rounded"
                                        src="{{ asset('storage/' . $team->profile_picture) }}" alt=""></td>
                                <td>
                                    @if (Auth::check() && Auth::user()->id == $team->id)
                                        <a href="/dashboard/team/{{ $team->id }}/edit" class="btn btn-sm btn-info"><i
                                                class="icon-copy dw dw-edit-1"></i></a>
                                    @else
                                        <form action="/dashboard/team/{{ $team->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger"><i
                                                    class="icon-copy dw dw-delete-3"></i></button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <!-- Simple Datatable End -->
    </div>
@endsection
