@extends('backend.index')
@section('title', 'Article Detail | Skiddie ID')
@section('container')

    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Article Detail</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Article Detail
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="blog-wrap">
            <div class="container pd-0">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="blog-detail card-box overflow-hidden mb-30">
                            <div class="blog-img">
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="" />
                            </div>
                            <div class="blog-caption">
                                <h4 class="mb-10">
                                    {{ $article->title }}
                                </h4>
                                <p>
                                    {{ $article->body }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card-box mb-30">
                            <h5 class="pd-20 h5 mb-0">Recent Post</h5>
                            <div class="latest-post">
                                <ul>
                                    @foreach ($recentArticles as $recent)
                                        <li>
                                            <h4>
                                                <a href="/dashboard/article/{{ $recent->slug }}"> {{ $recent->title }} </a>
                                            </h4>
                                            <span>{{ $recent->category }}</span>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
