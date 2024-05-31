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

                <li class="menu-title">
                    <span>Management</span>
                </li>

                <li>
                    <a href="{{route('mentor.manageNilai.index')}}"><i class="fas fa-clipboard-list"></i> <span>Grades</span></a>
                </li>
                <li>
                    <a href="{{route('feedback_mentor')}}"><i class="fas fa-clipboard-list"></i> <span>Feedback Mentor</span></a>
                </li>
              
            </ul>
        </div>
    </div>
</div>