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
                    {{-- <a href="{{route('manage-nilai')}}"><i class="fas fa-clipboard-list"></i> <span>Grades</span></a> --}}
                   
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
                        <span> Mentor view </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href=""  class=" (request()->is('student/profile/*')) ? 'active' : '' ">Mentor View</a></li>
                    </ul>
                </li>

                <li class="menu-title">
                    <span>Management</span>
                </li>

                <li>
                    <a href="{{ route('dashboard_mentor') }}"><i class="fas fa-home"></i> <span>Mentor Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('mentor.manageNilai.index')}}"><i class="fas fa-clipboard-list"></i> <span>Grades</span></a>
                </li>
                <li>
                    <a href="{{route('materi_mentor')}}"><i class="fas fa-book-open"></i> <span>Kelola Materi</span></a>
                </li>
                <li>
                    <a href="{{route('assignment_mentor')}}"><i class="fa fa-edit"></i> <span>Kelola Assignment</span></a>
                </li>
                <li>
                    <a href="{{route('video_mentor')}}"><i class="fa fa-file-video"></i> <span>Kelola Video</span></a>
                </li>
                <li>
                    <a href="{{route('mentor_artikel')}}"><i class="far fa-newspaper"></i> <span>Lihat Artikel</span></a>
                </li>
                <li>
                    <a href="{{route('feedback_mentor')}}"><i class="fas fa-clipboard-list"></i> <span>Feedback Mentor</span></a>
                </li>
              
            </ul>
        </div>
    </div>
</div>