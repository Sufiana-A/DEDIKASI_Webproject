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
                        <li><a href="('teacher/dashboard') " class="(['teacher/dashboard'])}}">Teacher Dashboard</a></li>
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
                        <span> Fitur 1 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="('student/list') "  class="(['student/list','student/grid'])">Student List</a></li>
                        <li><a href="('student/add/page') }}" class="(['student/add/page'])}}">Student Add</a></li>
                        <li><a class="(()->is('student/edit/*')) ? 'active' : '' ">Student Edit</a></li>
                        <li><a href=""  class=" (request()->is('student/profile/*')) ? 'active' : '' ">Student View</a></li>
                    </ul>
                </li>

                <li class="submenu  (['teacher/add/page','teacher/list/page','teacher/grid/page','teacher/edit'])}}  (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Fitur 2</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="('teacher/list/page') }}" class="(['teacher/list/page','teacher/grid/page'])}}">Teacher List</a></li>
                        <li><a href="teacher-details.html">Teacher View</a></li>
                        <li><a href="('teacher/add/page') }}" class="(['teacher/add/page'])">Teacher Add</a></li>
                        <li><a class="()->is('teacher/edit/*')) ? 'active' : '' }}">Teacher Edit</a></li>
                    </ul>
                </li>

                <li class="submenu (['department/add/page','department/edit/page'])}} ()->is('department/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-building"></i>
                        <span> Fitur 3 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="('department/list/page') }}" class="(['department/list/page'])}} ()->is('department/edit/*') ? 'active' : '' }}">Department List</a></li>
                        <li><a href="('department/add/page') }}" class="(['department/add/page'])}}">Department Add</a></li>
                        <li><a>Department Edit</a></li>
                    </ul>
                </li>

                <li class="submenu (['subject/list/page','subject/add/page'])}} ()->is('subject/edit/*') ? 'active' : '' ">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span> Fitur 4 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="(['subject/list/page'])}} ()->('subject/edit/*') ? 'active' : '' }}" href="('subject/list/page')">Subject List</a></li>
                        <li><a class="(['subject/add/page'])}}" href="('subject/add/page') ">Subject Add</a></li>
                        <li><a>Subject Edit</a></li>
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
                    <a href="{{route('feedback_peserta')}}"><i class="fas fa-clipboard-list"></i> <span>Feedback</span></a>
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
