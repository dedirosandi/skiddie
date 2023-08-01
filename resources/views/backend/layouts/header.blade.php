 @php
     $unreadMessage = \App\Models\backend\Message::where('status', 'unread')
         ->latest('created_at')
         ->get();
 @endphp
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
                     @if ($unreadMessage->isEmpty())
                     @else
                         <span class="badge notification-active"></span>
                     @endif
                 </a>
                 <div class="dropdown-menu dropdown-menu-right">
                     <div class="notification-list mx-h-350 customscroll">
                         <ul class="notifications-list">
                             @if ($unreadMessage->isEmpty())
                                 <b>Tidak ada pesan yang belum dibaca.</b>
                             @else
                                 @foreach ($unreadMessage as $message)
                                     <li>
                                         <a href="/dashboard/message/{{ $message->id }}">
                                             <img src="{{ asset('assets-backend/vendors/images/person.svg') }}"
                                                 alt="" />
                                             <h3> {{ $message->name }} </h3>
                                             <p>
                                                 {{ $message->message }}
                                             </p>
                                         </a>
                                     </li>
                                 @endforeach
                             @endif
                         </ul>
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
                     {{-- <a class="dropdown-item" href="/dashboard/team/{{ auth()->user()->id }}/edit"><i
                             class="dw dw-settings2"></i> Setting</a> --}}
                     <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                         <i class="dw dw-settings2"></i> Setting</button>


                     <form action="/logout" method="POST">
                         @csrf
                         <button type="submit" class="dropdown-item"> <i class="dw dw-logout"></i> Log Out</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <form action="/dashboard/team/{{ auth()->user()->id }}" method="post">
             @method('put')
             @csrf
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label>New Password</label>
                         <input class="form-control" type="password" name="password" autocomplete="off" />
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
