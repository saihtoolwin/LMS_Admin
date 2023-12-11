<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="{{ asset('img/logo1.png') }}" width="40" height="40" alt="">
                    <span class="text-uppercase">Preschool</span>
                </a>
            </div>
            <ul class="sidebar-ul">
                <li class="menu-title">Menu</li>
                <li class="active">
                    <a href="#"><img src="{{ asset('img/sidebar/icon-1.png') }}"
                            alt="icon"><span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('img/sidebar/icon-14.png') }}" alt="icon"> <span>
                            Frontend Configuration</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('alert.index') }}"><span>Alert</span></a></li>
                        <li><a href="{{route('coreteam.index')}}"><span>Core Team</span></a></li>
                        <li><a href="{{route('curriculum.index')}}"><span>Curriculum</span></a></li>
                        <li><a href="{{ route('careeropptunity.index') }}"><span>Career Opptunity</span></a></li>
                        <li><a href="{{ route('mediacategories.index') }}"><span>Media Category</span></a></li>
                        <li><a href="{{ route('posts.index') }}"><span>Posts</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('img/sidebar/icon-2.png') }}" alt="icon">
                        <span>Admin</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('academic.index') }}"><span>Academic year</span></a></li>
                        <li><a href="{{ route('year.index') }}"><span>Year</span></a></li>
                        <li><a href="{{ route('class.index') }}"><span>Class</span></a></li>
                        <li><a href="{{ route('subject.index') }}"><span>Subject</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('img/sidebar/icon-3.png') }}" alt="icon"> <span>
                            Students</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="all-students.html"><span>All Students</span></a></li>
                        <li><a href="add-student.html"><span>Add Student</span></a></li>
                        <li><a href="edit-student.html"><span>Edit Student</span></a></li>
                        <li><a href="about-student.html"><span>ABout student</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('img/sidebar/icon-3.png') }}" alt="icon"> <span>
                            Frontend Configuration</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('alert.index') }}"><span>Alert</span></a></li>
                        <li><a href="{{route('coreteam.index')}}"><span>Core Team</span></a></li>
                        <li><a href="edit-student.html"><span>News</span></a></li>
                        <li><a href="about-student.html"><span>Curriculum</span></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
