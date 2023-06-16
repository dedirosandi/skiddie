@extends('backend.index')
@section('title', 'File Manager | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>File Manager Skiddie</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                File Manager
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="/dashboard/filemanager/create" class="btn btn-sm btn-success"> Upload New File</a>
                </div>
            </div>
        </div>

        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">File Manager</h4>
            </div>
            <div class="pb-20">
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">File Name</th>
                            <th class="">Type File</th>
                            <th class="">File Size</th>
                            <th class="">Link Short</th>
                            <th class="">Uploaded By</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filemanagers as $files)
                            <tr>
                                <td>{{ $files->file_name }}</td>
                                <td>{{ $files->file_type }}</td>
                                <td>
                                    @if ($files->file_size >= 1024 * 1024)
                                        {{ substr(number_format(round($files->file_size / (1024 * 1024), 3), 3), 0, -3) }}
                                        MB
                                    @else
                                        {{ substr(number_format(round($files->file_size / 1024, 3), 3), 0, -3) }} KB
                                    @endif
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $files->shortUrl }}"
                                            id="shortUrlInput_{{ $files->id }}" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary btn-copy"
                                                data-clipboard-text="{{ $files->shortUrl }}">Salin</button>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $files->uploadedByUser->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item"
                                                href="/dashboard/filemanager/{{ $files->id }}/download"><i
                                                    class="dw dw-download1"></i> Download</a>
                                            @if (Auth::id() == $files->uploaded_by)
                                                <a class="dropdown-item"
                                                    href="/dashboard/filemanager/{{ $files->id }}/edit"><i
                                                        class="dw dw-edit2"></i> Edit</a>
                                                <form action="/dashboard/filemanager/{{ $files->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item"><i class="dw dw-delete-3"></i>
                                                        Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Simple Datatable End -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var clipboard = new ClipboardJS('.btn-copy');

            clipboard.on('success', function(e) {
                e.trigger.textContent = 'Tersalin';
                setTimeout(function() {
                    e.trigger.textContent = 'Salin';
                }, 2000);
                e.clearSelection();
            });

            clipboard.on('error', function(e) {
                console.error('Penyalinan gagal:', e.action);
            });
        });
    </script>
@endsection
