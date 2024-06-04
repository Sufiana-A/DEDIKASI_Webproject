<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                <li class="submenu (['home','teacher/dashboard','student/dashboard'])">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.manageCourse.index') }}" class="(['home'])">Admin Dashboard</a></li>
                        <li><a href="{{ route('student.dashboard.index') }}" class="(['student/dashboard'])}}">Student Dashboard</a></li>
                    </ul>
                </li>
                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                <li class="submenu (['list/users'])}} (request()->is('view/user/edit/*')) ? 'active' : '' ">
                    <a href="#">
                        <i class="fas fa-shield-alt"></i>
                        <span>User Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="('list/users') }}" class="(['list/users'])}} (request()->is('view/user/edit/*')) ? 'active' : '' }}">List Users</a></li>
                    </ul>
                </li>
                @endif

                <li class="submenu (['student/list','student/grid','student/add/page'])  (request()->is('student/edit/*')) ? 'active' : ''   (request()->is('student/profile/*')) ? 'active' : '' ">
                    <a href="#"><i class="fas fa-graduation-cap"></i>
                        <span> Student view </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href=""  class=" (request()->is('student/profile/*')) ? 'active' : '' ">Student View</a></li>
                    </ul>
                </li>

                <li class="menu-title">
                    <span>Management</span>
                </li>
                <li>
                    <a href="{{ route('student.dashboard.index') }}"><i class="fas fa-home"></i> <span>Student Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('progress')}}"><i class="fas fa-clipboard-list"></i> <span>Progress Peserta</span></a>
                </li>
                <li>
                    <a href="{{route('list_peserta_pelatihan')}}"><i class="fas fa-clipboard-list"></i> <span>List Pelatihan</span></a>
                </li>
                <li>
                    <a href="{{route('feedback_peserta')}}"><i class="fas fa-clipboard-list"></i> <span>Feedback</span></a>
                </li>
                <li>
                    <a href="{{route('nilai-peserta')}}"><i class="fas fa-clipboard-list"></i> <span>Nilai Peserta</span></a>
                </li>
                <li>
                    <a href="{{route('timeline_index')}}"><i class="fas fa-calendar-day"></i> <span>Timeline</span></a>
                </li>
                <li>
                    <a href="{{route('announcements.index')}}"><i class="fas fa-clipboard-list"></i> <span>Pengumumuman</span></a>
                </li>
                <li>
                    <a href="{{route('view_loker')}}"><i class="fas fa-briefcase"></i> <span>Informasi Lowongan Kerja</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
