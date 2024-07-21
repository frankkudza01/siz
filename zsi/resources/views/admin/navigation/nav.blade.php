<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="" class="logo logo-dark">

            <span class="logo-lg">
                <img src="{{ asset('logo.png') }}" alt="" height="140">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="" class="logo logo-light">

            <span class="logo-lg">
                <img src="{{ asset('logo.png') }}" alt="" height="140">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"></li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('/admin/dashboard/') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Publications</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('/admin/articles/') }}" class="nav-link" data-key="t-chat"> Articles </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('/admin/resources/') }}" class="nav-link" data-key="t-chat"> Resources </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('/admin/events/') }}">
                        <i class="ri-calendar-todo-line"></i> <span data-key="t-layouts">Events</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

               <hr>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/admin/courses/') }}">
                        <i class="ri-book-line"></i> <span data-key="t-landing">Courses & Training</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('/admin/members/') }}">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Membership</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
