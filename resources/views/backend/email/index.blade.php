@extends('backend.index')
@section('title', 'Email | Skiddie ID')
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
                </div>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Article of Skiddie ID</h4>
            </div>
            <div class="pb-20">
                @foreach ($emails as $email)
                    <div class="email">
                        <h2>{{ $email['subject'] }}</h2>
                        <p>From: {{ $email['from'] }}</p>
                        <div>{!! $email['body'] !!}</div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        <!-- Simple Datatable End -->
    </div>
@endsection
