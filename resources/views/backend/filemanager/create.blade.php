@extends('backend.index')
@section('title', 'Create New Article | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <a href="/dashboard/filemanager" class="btn btn-sm btn-primary"> Back to list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="/dashboard/filemanager" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" class="form-control-file form-control height-auto" />
                </div>

                <div class="form-group">
                    <label>File Description</label>
                    <input id="x" type="hidden" name="file_description" value="{{ old('file_description') }}">
                    <trix-editor input="x"></trix-editor>
                </div>


                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Upload Process</button> <a class="btn btn-danger"
                            href="/dashboard/article">Cancle</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
