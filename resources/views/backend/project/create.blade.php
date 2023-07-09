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


                {{-- <div class="form-group">
                    <label>Difficult Project</label>
                    <div class="difficult">
                        <input type="radio" id="star5" name="difficult" value="5" class="star5" />
                        <label for="star5" title="5 stars"></label>
                        <input type="radio" id="star4" name="difficult" value="4" />
                        <label for="star4" title="4 stars"></label>
                        <input type="radio" id="star3" name="difficult" value="3" />
                        <label for="star3" title="3 stars"></label>
                        <input type="radio" id="star2" name="difficult" value="2" />
                        <label for="star2" title="2 stars"></label>
                        <input type="radio" id="star1" name="difficult" value="1" />
                        <label for="star1" title="1 star"></label>
                    </div>
                    <input type="range" class="form-control form-range" min="0" max="5" id="customRange2">
                </div> --}}


                <div class="form-group">
                    <label>Difficult Project</label>
                    <div class="row">
                        <div class="col-11">
                            <input style="width: 100%" name="difficult" type="range" class="form-range custom-range"
                                min="10" max="100" id="customRange2">
                        </div>
                        <div class="col-1">
                            <span id="percentage"></span>
                        </div>
                    </div>
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
                    <label>Body Content</label>
                    <input id="x" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="x"></trix-editor>
                </div>
                <div class="form-group">
                    <label>Project Image</label>
                    <input type="file" name="image[]" class="form-control-file form-control height-auto" multiple />
                </div>
                <div class="preview-images mb-5">
                    <p>Preview:</p>
                    <div class="card-group">
                        <!-- Tampilkan gambar-gambar yang akan diunggah -->
                        <div id="preview-container" class="card">
                            <div class="card-body">
                                <div id="image-preview" class="card-text"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Create Process</button> <a class="btn btn-danger"
                            href="/dashboard/project">Cancle</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
