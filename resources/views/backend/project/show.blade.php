@extends('backend.index')
@section('title', 'Detail Project | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Project Detail</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Project Detail
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="product-wrap">
            <div class="product-detail-wrap mb-30">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="product-slider slider-arrow">
                            @foreach ($project->project_images as $images)
                                <div class="product-slide">
                                    <img src="{{ asset('storage/' . $images->image) }}" alt="" />
                                </div>
                            @endforeach
                        </div>
                        <div class="product-slider-nav">
                            @foreach ($project->project_images as $images)
                                <div class="product-slide-nav">
                                    <img src="{{ asset('storage/' . $images->image) }}" alt="" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="product-detail-desc pd-20 card-box height-100-p">
                            <h4 class="mb-20 pt-20"> {{ $project->name }} </h4>
                            <p>Team : @foreach ($project->users as $user)
                                    <span class="badge bg-success mb-1 text-white"> {{ $user->name }}</span>
                                @endforeach
                            </p>
                            <p>
                                {!! $project->body !!}
                            </p>
                            <div class="price"><ins>Price : Rp.{{ $project->price }} </ins></div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mb-20">Recent Project</h4>
            <div class="product-list">
                <ul class="row">
                    @foreach ($recentProjects as $recent)
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="product-box">
                                <div class="producct-img">
                                    <img src="vendors/images/product-img1.jpg" alt="" />
                                </div>
                                <div class="product-caption">
                                    <h4><a href="#"> {{ $recent->name }} </a></h4>
                                    <a href="/dashboard/project/{{ $recent->slug }}" class="btn btn-outline-primary">Read
                                        More</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
