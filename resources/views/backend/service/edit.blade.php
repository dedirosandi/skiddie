@extends('backend.index')
@section('title', 'Edit service | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <a href="/dashboard/service" class="btn btn-sm btn-primary"> Back to list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="/dashboard/service/{{ $service->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Service Title</label>
                    <input class="form-control" type="text" name="title" id="title"
                        value="{{ old('title') ?? $service->title }}" placeholder="Sistem Akademik Sekolah" />
                </div>
                <div class="form-group">
                    <label>Service Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control-file form-control height-auto" />
                    <input type="hidden" name="oldImage" value="{{ $service->thumbnail }}">
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Create Process</button> <a class="btn btn-danger"
                            href="/dashboard/article">Cancle</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
