<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="(['setting/page'])">
                    <a href="('setting/page') }}">
                        <i class="fas fa-cog"></i> 
                        <span>Settings</span>
                    </a>
                </li>
                <li class="submenu (['home','teacher/dashboard','student/dashboard'])">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="('home') }}" class="(['home'])">Admin Dashboard</a></li>
                        <li><a href="('teacher/dashboard') " class="(['teacher/dashboard'])}}">Teacher Dashboard</a></li>
                        <li><a href="('student/dashboard') }}" class="(['student/dashboard'])}}">Student Dashboard</a></li>
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
                        <span> Students</span>
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
                        <span> Teachers</span>
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
                        <span> Departments</span>
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
                        <span> Subjects</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="(['subject/list/page'])}} ()->('subject/edit/*') ? 'active' : '' }}" href="('subject/list/page')">Subject List</a></li>
                        <li><a class="(['subject/add/page'])}}" href="('subject/add/page') ">Subject Add</a></li>
                        <li><a>Subject Edit</a></li>
                    </ul>
                </li>

                <li class="submenu (['invoice/list/page','invoice/paid/page',
                    'invoice/overdue/page','invoice/draft/page','invoice/recurring/page',
                    'invoice/cancelled/page','invoice/grid/page','invoice/add/page',
                    'invoice/view/page','invoice/settings/page',
                    'invoice/settings/tax/page','invoice/settings/bank/page'])}} >is('invoice/edit/*') ? 'active' : '' >
                    <a href="#><i class="fas fa-clipboard"></i>
                        <span> Invoices</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="(['invoice/list/page','invoice/paid/page','invoice/overdue/page','invoice/draft/page','invoice/recurring/page','invoice/cancelled/page'])}}" href="('invoice/list/page') }}">Invoices List</a></li>
                        <li><a class="(['invoice/grid/page'])}}" href="('invoice/grid/page') }}">Invoices Grid</a></li>
                        <li><a class="(['invoice/add/page'])}}" href="('invoice/add/page') }}">Add Invoices</a></li>
                        <li><a class="t()->is('invoice/edit/*') ? 'active' : '' }}" href="">Edit Invoices</a></li>
                        <li> <a class="t()->is('invoice/view/*') ? 'active' : '' }}" href="">Invoices Details</a></li>
                        <li><a class="(['invoice/settings/page','invoice/settings/tax/page','invoice/settings/bank/page'])}}" href="('invoice/settings/page') }}">Invoices Settings</a></li>
                    </ul>
                </li>

                <li class="menu-title">
                    <span>Management</span>
                </li>

                <li class="submenu (['account/fees/collections/page','add/fees/collection/page'])}}">
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i>
                        <span> Accounts</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="(['account/fees/collections/page'])}}" href="('account/fees/collections/page') ">Fees Collection</a></li>
                        <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="salary.html">Salary</a></li>
                        <li><a class="(['add/fees/collection/page'])}}" href="('add/fees/collection/page') }}">Add Fees</a></li>
                        <li><a href="add-expenses.html">Add Expenses</a></li>
                        <li><a href="add-salary.html">Add Salary</a></li>
                    </ul>
                </li>
                <li>
                    <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                </li>
                <li>
                    <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
                </li>
                <li>
                    <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                </li>
                <li>
                    <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                </li>
                <li>
                    <a href="library.html"><i class="fas fa-book"></i> <span>Library</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>