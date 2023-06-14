@extends('backend.index')
@section('title', 'Create New Project | Skiddie ID')
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
            <form action="/dashboard/project" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Project Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                        placeholder="Sistem Akademik Sekolah" />
                </div>
                <div class="form-group">
                    <label>Slug Name</label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug') }}"
                        placeholder="sistem-akademik-sekolah" readonly />
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" name="price" placeholder="1500000"
                        value="{{ old('price') }}" />
                </div>
                <div class="form-group">
                    <label>Demo Link</label>
                    <input class="form-control" type="url" name="demo_link" placeholder="https://www.demo.skiddie.id"
                        value="{{ old('demo_link') }}" />
                </div>
                <div class="form-group">
                    <label>Tools</label>
                    <input class="form-control" name="tools" placeholder="Laravel, Mysql, Css" type="text"
                        value="{{ old('tools') }}" data-role="tagsinput" />
                </div>
                <div class="form-group">
                    <label>Select a Team</label>
                    <select class="custom-select2 form-control" name="user_id[]" value="{{ old('user_id[]') }}"
                        multiple="multiple" style="width: 100%" required>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}"> {{ $team->name }} - {{ $team->as }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="body">{{ old('body') }}</textarea>
                </div>
                {{-- <div class="form-group">
                    <label>Thumbnail</label>
                    <div class="custom-file">
                        <input type="file" name="image[]" class="custom-file-input" multiple />
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label>Project Image</label>
                    <input type="file" name="image[]" class="form-control-file form-control height-auto" multiple />
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
