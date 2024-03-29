<!DOCTYPE html>
<html dir="{{ App()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @if(App()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ url('admin_ar') }}/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ url('admin_ar') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="{{ url('admin_ar') }}/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="{{ url('admin_ar') }}/dist/css/skins/_all-skins.min.css">

    @else
        <link rel="stylesheet" href="{{ url('admin_en') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('admin_en') }}/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ url('admin_en') }}/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ url('admin_en') }}/bower_components/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="{{ url('admin_en') }}/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="{{ url('admin_en') }}/dist/css/skins/_all-skins.min.css">
    @endif
    {{--<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>--}}

    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/tagify.css') }}">
    <style>
        /*body, h1, h2, h3 {*/
            /*font-family: 'Cairo';font-size: 13px;*/
        /*}*/

        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }

        table ,tr,th {
            text-align: start;
        }
    </style>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    @stack('css')

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    @if(App()->getLocale() == 'en')
                        <!-- language changer -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('locale','ar') }}">العربية</a></li>
                                    <li><a href="{{ route('locale','en') }}">English</a></li>
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ url('admin_en') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{ auth()->user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{ url('admin_en') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            {{ auth()->user()->name }}
                                            <small>{{ auth()->user()->created_at }}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">@lang('common::common.profile')</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('get_logout') }}" class="btn btn-default btn-flat">@lang('common::common.sign_out')</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                    @else
                        <!-- language changer -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ url('admin_en') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{ auth()->user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{ url('admin_en') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            {{ auth()->user()->name }}
                                            <small>{{ auth()->user()->created_at }}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">@lang('common::common.profile')</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('get_logout') }}" class="btn btn-default btn-flat">@lang('common::common.sign_out')</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('locale','ar') }}">العربية</a></li>
                                    <li><a href="{{ route('locale','en') }}">English</a></li>
                                </ul>
                            </li>
                            <li class="dropdown calls_class tasks-menu" >
                                <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg" >
                                    <i class="fa fa-phone"></i> @lang('common::common.calls')
                                </a>
                                <ul class="dropdown-menu">

                                </ul>
                            </li>
                    @endif
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    @include('common::layouts._aside')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-user bg-yellow"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Other sets of options are available
                        </p>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div><!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div><!-- ./wrapper -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="row">
                    <div style="min-height: 400px;" class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 style="font-family: 'Cairo', sans-serif;" class="box-title">{{ 'سجل المكالمات' }}</h3>
                            </div>

                            <div class="box-body">
                                @include('common::layouts._session')
                                @if($calls->count() > 0)
                                    <table id="call_table_id" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('tutor::tutor.name')</th>
                                            <th>@lang('student::student.name')</th>
                                            <th>@lang('common::common.url')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($calls as $index=>$call)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $call->tutor->name }}</td>
                                                @if($call->student !== null)
                                                <td>{{ $call->student->name }}</td>
                                                @else
                                                <td></td>
                                                @endif
                                                <td><a class="btn btn-info" href="{{ $call->join_url }}">@lang('common::common.click_here')</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h1 style="font-family: 'Cairo', sans-serif;">للاسف لا توجد مكالمات حتي الان</h1>
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>
@if(App()->getLocale() == 'ar')
    <script src="{{ url('admin_ar') }}/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="{{ url('admin_ar') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('admin_ar') }}/plugins/fastclick/fastclick.min.js"></script>
    <script src="{{ url('admin_ar') }}/dist/js/app.min.js"></script>
    <script src="{{ url('admin_ar') }}/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ url('admin_ar') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ url('admin_ar') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ url('admin_ar') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="{{ url('admin_ar') }}/plugins/chartjs/Chart.min.js"></script>
    <script src="{{ url('admin_ar') }}/dist/js/pages/dashboard2.js"></script>
    <script src="{{ url('admin_ar') }}/dist/js/demo.js"></script>
@else
    <script src="{{ url('admin_en') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('admin_en') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ url('admin_en') }}/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="{{ url('admin_en') }}/dist/js/adminlte.min.js"></script>
    <script src="{{ url('admin_en') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="{{ url('admin_en') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ url('admin_en') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ url('admin_en') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ url('admin_en') }}/bower_components/chart.js/Chart.js"></script>
    <script src="{{ url('admin_en') }}/dist/js/pages/dashboard2.js"></script>
    <script src="{{ url('admin_en') }}/dist/js/demo.js"></script>
    <script type="text/javascript" src="{{ url('js/tagify.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#certificates2').tagify();

            // var input = document.querySelector('$certificates2'),
            // tagify =new Tagify( input );

        });
    </script>
@endif

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/bs/jq-3.3.1/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.css"/>

@endpush

@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/w/bs/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>

    <script type="text/javascript">

        $(document).ready( function () {
            $('#call_table_id').DataTable();
        } );
    </script>

@endpush

@stack('js')
</body>
</html>