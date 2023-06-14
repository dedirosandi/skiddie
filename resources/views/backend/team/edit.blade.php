@extends('backend.index')
@section('title', 'Edit a Team | Skiddie ID')
@section('container')

    @if (Auth::check() && Auth::user()->id == $teams->id)
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <a href="/dashboard/team" class="btn btn-sm btn-primary"> Back to list</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <form action="/dashboard/team/{{ $teams->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name', $teams->name) }}"
                            placeholder="Johnny Brown" />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username"
                            value="{{ old('username', $teams->username) }}" placeholder="johnnybrown" />
                    </div>
                    <div class="form-group">
                        <label>As a</label>
                        <input class="form-control" type="text" name="as" value="{{ old('as', $teams->as) }}"
                            placeholder="Full Stack Web Developer" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Email"
                            value="{{ old('email', $teams->email) }}" type="email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{ old('description', $teams->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Profile Picture</label>
                        <div class="custom-file">
                            <input type="hidden" name="oldImage" value="{{ $teams->profile_picture }}">
                            <input type="file" name="profile_picture" class="custom-file-input" />
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success">Create Process</button> <a class="btn btn-danger"
                                href="/dashboard/team">Cancle</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    @else
        <div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
            <div class="pd-10">
                <div class="error-page-wrap text-center">
                    <h1>403</h1>
                    <h3>Error: 403 Forbidden</h3>
                    <p>
                        Sorry, access to this resource on the server is denied.<br />Either
                        check the URL
                    </p>
                    <div class="pt-20 mx-auto max-width-200">
                        <a href="/dashboard/team" class="btn btn-primary btn-block btn-lg">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    @endif





@endsection
