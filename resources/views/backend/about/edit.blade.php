@extends('backend.index')
@section('title', 'Edit About | Skiddie ID')
@section('container')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard/about/{{ $abouts->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                            value="{{ old('title', $abouts->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Email</label>
                        <input type="email" class="form-control" id="contact" name="contact" placeholder="Enter Email"
                            value="{{ old('contact', $abouts->contact) }}">
                    </div>
                    <div class="form-group">
                        <div class="col-6">
                            <img src="{{ asset('storage/' . $abouts->thumbnail) }}" alt="Thumbnail"
                                class="img-fluid w-25 rounded-3 border-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="hidden" name="oldImage" value="{{ $abouts->thumbnail }}">
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                            value="{{ old('thumbnail') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        {{-- <textarea class="form-control" id="comment" rows="5"></textarea> --}}
                        <input id="x" type="hidden" name="description"
                            value="{{ old('description', $abouts->description) }}">
                        <trix-editor input="x"></trix-editor>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/dashboard/about" class="btn btn-danger"> Cancle</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
