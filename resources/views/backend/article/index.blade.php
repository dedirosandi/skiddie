@extends('backend.index')
@section('title', 'Article | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>List Article Post Skiddie</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Article
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="/dashboard/article/create" class="btn btn-sm btn-success"> Create a New Article</a>
                </div>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Article of Skiddie ID</h4>
            </div>
            <div class="pb-20">
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Article Name</th>
                            <th class="">Category</th>
                            <th class="">Author</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ substr($article->title, 0, 50) }}...</td>
                                <td>{{ $article->category }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="/dashboard/article/{{ $article->slug }}"><i
                                                    class="dw dw-eye"></i> View</a>
                                            @if (Auth::id() == $article->user_id)
                                                <a class="dropdown-item"
                                                    href="/dashboard/article/{{ $article->slug }}/edit"><i
                                                        class="dw dw-edit2"></i> Edit</a>
                                                <form action="/dashboard/article/{{ $article->slug }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item"><i class="dw dw-delete-3"></i>
                                                        Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

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
