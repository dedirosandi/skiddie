@extends('backend.index')
@section('title', 'Message | Skiddie ID')
@section('container')
    <div class="min-height-200px">
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Message</h4>
            </div>
            <div class="pb-20">
                <table class="data-table table">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Name</th>
                            <th class="">Email</th>
                            <th class="">Whatsapp</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>
                                    @if ($message->status === 'unread')
                                        <b class="badge bg-primary text-white">{{ $message->name }}</b>
                                    @else
                                        {{ $message->name }}
                                    @endif
                                </td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->whatsapp }}</td>
                                <td>
                                    <a class="btn btn-success" href="/dashboard/message/{{ $message->id }}"><i
                                            class="icon-copy dw dw-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <!-- Simple Datatable End -->
    </div>
@endsection
