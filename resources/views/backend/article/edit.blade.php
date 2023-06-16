@extends('backend.index')
@section('title', 'Create New Article | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <a href="/dashboard/acticle" class="btn btn-sm btn-primary"> Back to list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="/dashboard/article/{{ $article->slug }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Title Article</label>
                    <input class="form-control" type="text" name="title" id="title"
                        value="{{ old('title') ?? $article->title }}" placeholder="Sistem Akademik Sekolah" />
                </div>
                <div class="form-group">
                    <label>Slug Name</label>
                    <input class="form-control" type="text" name="slug" id="slug"
                        value="{{ old('slug') ?? $article->slug }}" placeholder="sistem-akademik-sekolah" readonly />
                </div>
                <div class="form-group">
                    <label>Select Category</label>
                    <select class="custom-select2 form-control" name="category" style="width: 100%; height: 38px">
                        <option value="Programming"
                            {{ (old('category') ?? $article->category) === 'Programming' ? 'selected' : '' }}>Programming
                        </option>
                        <option value="Technology"
                            {{ (old('category') ?? $article->category) === 'Technology' ? 'selected' : '' }}>Technology
                        </option>
                        <option value="Lifestyle"
                            {{ (old('category') ?? $article->category) === 'Lifestyle' ? 'selected' : '' }}>Lifestyle
                        </option>
                        <option value="Information"
                            {{ (old('category') ?? $article->category) === 'Information' ? 'selected' : '' }}>Information
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Body Content</label>
                    <input id="x" type="hidden" name="body" value="{{ old('body') ?? $article->body }}">
                    <trix-editor input="x"></trix-editor>
                </div>
                @if ($article && $article->thumbnail)
                    <img width="150" src="{{ asset('storage/' . $article->thumbnail) }}" class="img-thumbnail mb-2"
                        alt="...">
                @endif
                <div class="form-group">
                    <label>Article Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control-file form-control height-auto" />
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

    <script>
        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {
            fetch('/dashboard/article/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

@endsection
