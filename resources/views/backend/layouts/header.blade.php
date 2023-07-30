<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">

        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        @php
                            $unreadMessage = \App\Models\backend\Message::where('status', 'unread')
                                ->latest('created_at')
                                ->get();
                        @endphp
                        @if ($unreadMessage->isEmpty())
                            <b>Tidak ada pesan yang belum dibaca.</b>
                        @else
                            <ul class="notifications-list">
                                @foreach ($unreadMessage as $message)
                                    <li>
                                        <a href="/dashboard/message/{{ $message->id }}">
                                            <img src="{{ asset('assets-backend/vendors/images/img.jpg') }}"
                                                alt="" />
                                            <h3> {{ $message->name }} </h3>
                                            <p>
                                                {{ $message->message }}
                                            </p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="" />
                    </span>
                    <span class="user-name">
                        {{ auth()->user()->name }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="/dashboard/team/{{ auth()->user()->id }}/edit"><i
                            class="dw dw-settings2"></i> Setting</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"> <i class="dw dw-logout"></i> Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
