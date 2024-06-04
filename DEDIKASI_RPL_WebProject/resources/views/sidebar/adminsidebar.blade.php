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
                        {{-- <li><a href="('home') }}" class="(['home'])">Admin Dashboard</a></li> --}}
                        <a href="{{route('admin.manageCourse.index')}}"><i class="fas fa-clipboard-list"></i> <span>Manage Course</span></a>
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
                        <span> Admin view </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href=""  class=" (request()->is('student/profile/*')) ? 'active' : '' ">Admin View</a></li>
                    </ul>
                </li>

                <li class="menu-title">
                    <span>Management</span>
                </li>
                <li>
                    <a href="{{ route('admin.manageCourse.index') }}"><i class="fas fa-home"></i> <span>Admin Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('seleksi_peserta') }}"><i class="fas fa-check-circle"></i> <span>Seleksi Peserta</span></a>
                </li>
                <li>
                    <a href="{{ route('loker_admin') }}"><i class="fas fa-briefcase"></i> <span>Kelola Lowongan Kerja</span></a>
                </li>
                <li>
                    <a href="{{ route('feedback_sistem') }}"><i class="fas fa-clipboard-list"></i> <span>Feedback Sistem</span></a>
                </li>
                <li>
                    <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                </li>
                 
                <li>
                    <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                </li>
              
            </ul>
        </div>
    </div>
</div>