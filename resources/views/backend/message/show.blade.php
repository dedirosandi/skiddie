@extends('backend.index')
@section('title', 'Message | Skiddie ID')
@section('container')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <a href="/dashboard/message" class="btn btn-sm btn-primary"> Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-box mb-30">
        <!-- Card Header -->
        <div class="card-header text-white">
            <h4 class="card-title">Message Detail</h4>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <!-- Email Details -->
            <div class="email-detail">
                <div class="email-header">
                    <div class="d-flex justify-content-between">
                        <div class="email-sender font-weight-bold">From: {{ $message->name }} - {{ $message->whatsapp }}
                        </div>
                        <div class="email-date">{{ $message->created_at->format('F d, Y') }}</div>
                    </div>

                    <div class="email-recipient mt-3">To: <b>{{ auth()->user()->name }}</b></div>
                </div>

                <div class="email-body mt-3">
                    <p>{{ $message->message }}</p>
                </div>
            </div>

        </div>
    </div>

@endsection
