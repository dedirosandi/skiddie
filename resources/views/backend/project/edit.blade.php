@extends('backend.index')
@section('title', 'Edit a Project | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <a href="/dashboard/project" class="btn btn-sm btn-primary"> Back to list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="/dashboard/project/{{ $project->slug }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Project Name</label>
                    <input class="form-control" type="text" name="name" id="name"
                        value="{{ old('name', $project->name) }}" placeholder="Sistem Akademik Sekolah" />
                </div>
                <div class="form-group">
                    <label>Slug Name</label>
                    <input class="form-control" type="text" name="slug" id="slug"
                        value="{{ old('slug', $project->slug) }}" placeholder="sistem-akademik-sekolah" readonly />
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" name="price" placeholder="1500000"
                        value="{{ old('price', $project->price) }}" />
                </div>
                <div class="form-group">
                    <label>Demo Link</label>
                    <input class="form-control" type="url" name="demo_link" placeholder="https://www.demo.skiddie.id"
                        value="{{ old('demo_link', $project->demo_link) }}" />
                </div>
                <div class="form-group">
                    <label>Tools</label>
                    <input class="form-control" name="tools" placeholder="Laravel, Mysql, Css" type="text"
                        value="{{ old('tools', $project->tools) }}" data-role="tagsinput" />
                </div>
                <div class="form-group">
                    <label>Select a Team</label>
                    <select class="custom-select2 form-control" name="user_id[]" multiple="multiple" style="width: 100%"
                        required>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}"
                                {{ $project->users->contains($team->id) ? 'selected' : '' }}>
                                {{ $team->name }} - {{ $team->as }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Body Content</label>
                    <input id="x" type="hidden" name="body" value="{{ old('body', $project->body) }}">
                    <trix-editor input="x"></trix-editor>
                </div>

                <div class="card-group">
                    @foreach ($project->project_images as $image)
                        <div class="card">
                            <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="...">
                        </div>
                    @endforeach
                </div>

                <div class="form-group mt-5">
                    <label>Thumbnail</label>
                    <div class="custom-file">
                        <input type="file" name="image[]" class="custom-file-input" multiple>
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>




                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Create Process</button> <a class="btn btn-danger"
                            href="/dashboard/project">Cancle</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const name = document.querySelector('#name')
        const slug = document.querySelector('#slug')

        name.addEventListener('change', function() {
            fetch('/dashboard/project/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

@endsection
