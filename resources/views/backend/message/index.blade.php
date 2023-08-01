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
                                        <a href="/dashboard/message/{{ $message->id }}"
                                            class="text-danger">{{ $message->name }}</a>
                                    @else
                                        <a href="/dashboard/message/{{ $message->id }}"
                                            class="text-success">{{ $message->name }}</a>
                                    @endif
                                </td>
                                <td>{{ $message->email }}</td>
                                @php
                                    $internationalPhoneNumber = '62' . preg_replace('/\D/', '', $message->whatsapp);
                                    $whatsappURL = 'https://wa.me/' . $internationalPhoneNumber;
                                @endphp
                                <td><a target="_blank" href="{{ $whatsappURL }}">{{ $message->whatsapp }}</a></td>
                                <td>

                                    <form action="/dashboard/message/{{ $message->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        @if ($message->status === 'unread')
                                        @else
                                            <button class="btn btn-sm btn-danger"><i
                                                    class="icon-copy dw dw-trash"></i></button>
                                        @endif
                                    </form>
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
