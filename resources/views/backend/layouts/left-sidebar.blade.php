<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/dashboard">
            <img src="{{ asset('assets-backend/src/images/skiddie.png') }}" alt="" class="dark-logo" />
            <img src="{{ asset('assets-backend/src/images/skiddie.png') }}" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="/dashboard"
                        class="dropdown-toggle no-arrow {{ Request::is('dashboard') ? 'active' : '' }}">
                        <span class="micon bi bi-grid-fill"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"
                        class="dropdown-toggle {{ Request::is('dashboard/project*', 'dashboard/about*', 'dashboard/article*', 'dashboard/service*') ? 'active' : '' }}">
                        <span class="micon bi bi-front"></span><span class="mtext">Frontend</span>
                    </a>
                    <ul class="submenu">
                        <li><a class="{{ Request::is('dashboard/about*') ? 'active' : '' }}"
                                href="/dashboard/about">About</a></li>
                        <li><a class="{{ Request::is('dashboard/project*') ? 'active' : '' }}"
                                href="/dashboard/project">Project</a></li>
                        <li><a class="{{ Request::is('dashboard/article*') ? 'active' : '' }}"
                                href="/dashboard/article">Article</a></li>
                        <li><a class="{{ Request::is('dashboard/service*') ? 'active' : '' }}"
                                href="/dashboard/service">Service</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/dashboard/team"
                        class="dropdown-toggle no-arrow {{ Request::is('dashboard/team*') ? 'active' : '' }}">
                        <span class="micon bi bi-person-circle"></span><span class="mtext">Team</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/filemanager"
                        class="dropdown-toggle no-arrow {{ Request::is('dashboard/filemanager*') ? 'active' : '' }}">
                        <span class="micon bi bi-folder-fill"></span><span class="mtext">File Manager</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
