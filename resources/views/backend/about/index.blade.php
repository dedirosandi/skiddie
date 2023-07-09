@extends('backend.index')
@section('title', 'About | Skiddie ID')
@section('container')
    <div class="card-box pd-20 height-100-p mb-30" style="position: relative;">
        <div class="row align-items-center">
            @if ($abouts)
                <div class="col-md-4">
                    <img style="width: 400px; height: 243px;" src="{{ asset('storage/' . $abouts->thumbnail) }}"
                        alt="" />
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        {{ $abouts->title }}
                    </h4>
                    <p class="font-18 max-width-600">
                        {!! $abouts->description !!}
                    </p>
                    <div style="position: absolute; top: -4px; right: 10px;">
                        <a class="btn btn-primary" href="/dashboard/about/{{ $abouts->id }}/edit">Edit</a>
                    </div>
                </div>
            @else
                <div class="col-md-8">
                    <p>Data tidak ditemukan.</p>
                </div>
                <div class="col-md-4 text-right">
                    <div style="position: relative;">
                        <a class="btn btn-primary" href="/dashboard/about/create">Tambah</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
