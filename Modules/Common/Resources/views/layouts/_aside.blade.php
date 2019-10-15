<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('admin_en') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> @lang('common::common.online')</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="@lang('common::common.search')">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header" style="font-family: 'Cairo', sans-serif !important;">@lang('common::common.main_navigation')</li>
            <li class="active treeview">
                <a href="{{ route('admin_home') }}">
                    <i class="fa fa-dashboard"></i> <span>@lang('common::common.home')</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('admins.index') }}">
                    <i class="fa fa-user-secret"></i> <span>@lang('admin::admin.admins')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admins.create') }}">
                    <i class="fa fa-plus"></i> <span>@lang('admin::admin.create_admins')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('tutors.index') }}">
                    <i class="fa fa-user-md"></i> <span>@lang('tutor::tutor.tutors')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('tutors.create') }}">
                    <i class="fa fa-plus"></i> <span>@lang('tutor::tutor.create_tutors')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('students.index') }}">
                    <i class="fa fa-users"></i> <span>@lang('student::student.students')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('students.create') }}">
                    <i class="fa fa-plus"></i> <span>@lang('student::student.create_students')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('courses.index') }}">
                    <i class="fa fa-laptop"></i> <span>@lang('course::course.courses')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('courses.create') }}">
                    <i class="fa fa-plus"></i> <span>@lang('course::course.create_courses')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('accents.index') }}">
                    <i class="fa fa-language"></i> <span>@lang('accent::accent.accents')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('types.index') }}">
                    <i class="fa fa-certificate"></i> <span>@lang('type::type.types')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('specialists.index') }}">
                    <i class="fa fa-book"></i> <span>@lang('specialist::specialist.specialists')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('personals.index') }}">
                    <i class="fa fa-angellist"></i> <span>@lang('personal::personal.personals')</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>