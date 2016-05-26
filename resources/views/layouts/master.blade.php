<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Scorecard -Admin Dashboard</title>
        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->

        <link rel="stylesheet" href="{{ url('assets/css/vendor/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/css/vendor/animate.css')}}">
        <link rel="stylesheet" href="{{ url('assets/css/vendor/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/animsition/css/animsition.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/daterangepicker/daterangepicker-bs3.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/morris/morris.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/owl-carousel/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/owl-carousel/owl.theme.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/rickshaw/rickshaw.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/css/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/datatables.bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/chosen/chosen.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/summernote/summernote.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css')}}">

        <!-- project main css files -->
        <link rel="stylesheet" href="{{ url('assets/css/main.css')}}">
        <!--/ stylesheets -->

        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="{{ url('assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
        <!--/ modernizr -->
        <script type="text/javascript">
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script>

    </head>


    <body id="minovate" class="appWrapper">

        <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">

            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            <section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="index.html">
                            <span><strong>SOCIAL</strong>SCORING</span>
                        </a>
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    <!-- Branding end -->

                    <!-- Left-side navigation -->
                    <ul class="nav-left pull-left list-unstyled list-inline">
                        <li class="sidebar-collapse divided-right">
                            <a role="button" tabindex="0" class="collapse-sidebar">
                                <i class="fa fa-outdent"></i>
                            </a>
                        </li>
                        <li class="dropdown divided-right settings">
                            <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </a>

                        </li>
                    </ul>
                    <!-- Left-side navigation end -->

                    <!-- Search -->
                    <div class="search" id="main-search">
                        <input type="text" class="form-control underline-input" placeholder="Search...">
                    </div>

                    <!-- Right-side navigation -->
                    <ul class="nav-right pull-right list-inline">

                        <li class="dropdown nav-profile">

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/images/profile-photo.jpg" alt="" class="img-circle size-30x30">
                                <span>Admin <i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                                <li>
                                    <a role="button" tabindex="0">
                                        <i class="fa fa-lock"></i>Lock
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                                </li>

                            </ul>

                        </li>


                    </ul>
                    <!-- Right-side navigation end -->

                </header>

            </section>
            <!--/ HEADER Content  -->


            <!-- =================================================
            ================= CONTROLS Content ===================
            ================================================== -->
            <div id="controls">

                <!-- ================================================
                ================= SIDEBAR Content ===================
                ================================================= -->
                <aside id="sidebar">


                    <div id="sidebar-wrap">

                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigation <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">


                                        <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->
                                        <ul id="navigation">
                                            <li class="active"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-list"></i> <span>Score Cards</span></a>
                                                <ul>
                                                    <li><a href="{{url('/uploadnew')}}"><i class="fa fa-caret-right"></i>Upload New</a></li>
                                                    <li><a href="{{url('/scorecards')}}"><i class="fa fa-caret-right"></i>View</a></li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-pencil"></i> <span>Parameters</span></a>
                                                <ul>
                                                    <li><a href="{{url('/categories')}}"><i class="fa fa-caret-right"></i> Scoring Categories</a></li>
                                                    <li><a href="{{url('/scorecardparams')}}"><i class="fa fa-caret-right"></i> Scorecard Parameters</a></li>
                                                    <li><a href="{{url('/weights')}}"><i class="fa fa-caret-right"></i> Scoring Weights</a></li>
                                                    <li><a href="{{url('/parameters')}}"><i class="fa fa-caret-right"></i> System Parameters</a></li>

                                                </ul>
                                            </li>

                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-desktop"></i> <span>Administration</span></a>
                                                <ul>
                                                    <li><a href="login.html"><i class="fa fa-caret-right"></i> Users</a></li>
                                                    <li><a href="signup.html"><i class="fa fa-caret-right"></i> Roles</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-bar-chart-o"></i> <span>Reports</span></a>
                                                <ul>
                                                    <li><a href="login.html"><i class="fa fa-caret-right"></i> Audit Logs</a></li>
                                                    <li><a href="signup.html"><i class="fa fa-caret-right"></i> Score Cards</a></li>
                                                </ul>
                                            </li>


                                        </ul>
                                        <!--/ NAVIGATION Content -->


                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>


                </aside>
                <!--/ SIDEBAR Content -->

                <!-- =================================================
                ================= RIGHTBAR Content ===================
                ================================================== -->
                <aside id="rightbar">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
                            <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
                            <li role="presentation"><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-cog"></i></a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="users">
                                <h6><strong>Online</strong> Users</h6>

                                <ul>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/ici-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Ing. Imrich <strong>Kamarel</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Ulaanbaatar, Mongolia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="online">
                                        <div class="media">

                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/arnold-avatar.jpg" alt>
                                            </a>
                                            <span class="badge bg-lightred unread">3</span>

                                            <div class="media-body">
                                                <span class="media-heading">Arnold <strong>Karlsberg</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Bratislava, Slovakia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/peter-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Peter <strong>Kay</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Kosice, Slovakia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/george-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">George <strong>McCain</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Prague, Czech Republic</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="busy">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar1.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Lucius <strong>Cashmere</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Wien, Austria</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="busy">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar2.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Jesse <strong>Phoenix</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Berlin, Germany</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                                <h6><strong>Offline</strong> Users</h6>

                                <ul>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar4.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Dell <strong>MacApple</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Paris, France</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">

                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar5.jpg" alt>
                                            </a>

                                            <div class="media-body">
                                                <span class="media-heading">Roger <strong>Flopple</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Rome, Italia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar6.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Nico <strong>Vulture</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Kyjev, Ukraine</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar7.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Bobby <strong>Socks</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Moscow, Russia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Anna <strong>Opichia</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Budapest, Hungary</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="history">
                                <h6><strong>Chat</strong> History</h6>

                                <ul>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/ici-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Ing. Imrich <strong>Kamarel</strong></span>
                                                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="busy">
                                        <div class="media">

                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/arnold-avatar.jpg" alt>
                                            </a>
                                            <span class="badge bg-lightred unread">3</span>

                                            <div class="media-body">
                                                <span class="media-heading">Arnold <strong>Karlsberg</strong></span>
                                                <small>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/peter-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Peter <strong>Kay</strong></span>
                                                <small>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit </small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="friends">
                                <h6><strong>Friends</strong> List</h6>
                                <ul>

                                    <li class="online">
                                        <div class="media">

                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/arnold-avatar.jpg" alt>
                                            </a>
                                            <span class="badge bg-lightred unread">3</span>

                                            <div class="media-body">
                                                <span class="media-heading">Arnold <strong>Karlsberg</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Bratislava, Slovakia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Anna <strong>Opichia</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Budapest, Hungary</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="busy">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/random-avatar1.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Lucius <strong>Cashmere</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Wien, Austria</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
                                                <img class="media-object img-circle" src="assets/images/ici-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Ing. Imrich <strong>Kamarel</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Ulaanbaatar, Mongolia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="settings">
                                <h6><strong>Chat</strong> Settings</h6>

                                <ul class="settings">

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Show Offline Users</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-offline" checked="">
                                                    <label class="onoffswitch-label" for="show-offline">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Show Fullname</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-fullname">
                                                    <label class="onoffswitch-label" for="show-fullname">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">History Enable</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-history" checked="">
                                                    <label class="onoffswitch-label" for="show-history">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Show Locations</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-location" checked="">
                                                    <label class="onoffswitch-label" for="show-location">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Notifications</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-notifications">
                                                    <label class="onoffswitch-label" for="show-notifications">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Show Undread Count</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-unread" checked="">
                                                    <label class="onoffswitch-label" for="show-unread">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>

                </aside>
                <!--/ RIGHTBAR Content -->
                
                <section id="content">
                    
@yield('content')
                    
                    
                </section>





            </div>
            <!--/ Application Content -->



            <!-- ============================================
            ============== Vendor JavaScripts ===============
            ============================================= -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script> window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

            <script src="{{ url('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/jRespond/jRespond.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/d3/d3.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/d3/d3.layout.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/rickshaw/rickshaw.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/animsition/js/jquery.animsition.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/daterangepicker/moment.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/daterangepicker/daterangepicker.js')}}"></script>

            <script src="{{ url('assets/js/vendor/screenfull/screenfull.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/flot/jquery.flot.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/flot-spline/jquery.flot.spline.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/easypiechart/jquery.easypiechart.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/raphael/raphael-min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/morris/morris.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/owl-carousel/owl.carousel.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/datatables/extensions/dataTables.bootstrap.js')}}"></script>

            <script src="{{ url('assets/js/vendor/chosen/chosen.jquery.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/summernote/summernote.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/coolclock/coolclock.js')}}"></script>
            <script src="{{ url('assets/js/vendor/coolclock/excanvas.js')}}"></script>
            <!--/ vendor javascripts -->




            <!-- ============================================
            ============== Vendor JavaScripts ===============
            ============================================= -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script> window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

            <script src="{{ url('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/jRespond/jRespond.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/d3/d3.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/d3/d3.layout.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/rickshaw/rickshaw.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/animsition/js/jquery.animsition.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/daterangepicker/moment.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/daterangepicker/daterangepicker.js')}}"></script>

            <script src="{{ url('assets/js/vendor/screenfull/screenfull.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/flot/jquery.flot.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/flot-spline/jquery.flot.spline.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/easypiechart/jquery.easypiechart.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/raphael/raphael-min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/morris/morris.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/owl-carousel/owl.carousel.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/datatables/extensions/dataTables.bootstrap.js')}}"></script>

            <script src="{{ url('assets/js/vendor/chosen/chosen.jquery.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/summernote/summernote.min.js')}}"></script>

            <script src="{{ url('assets/js/vendor/coolclock/coolclock.js')}}"></script>
            <script src="{{ url('assets/js/vendor/coolclock/excanvas.js')}}"></script>
            <script src="{{ url('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/datatables/extensions/ColVis/js/dataTables.colVis.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
            <script src="{{ url('assets/js/vendor/datatables/extensions/dataTables.bootstrap.js')}}"></script>
            <!--/ vendor javascripts -->




            <!-- ============================================
            ============== Custom JavaScripts ===============
            ============================================= -->
            <script src="{{ url('assets/js/main.js')}}"></script>
            <!--/ custom javascripts -->





            <!-- ===============================================
            ============== Page Specific Scripts ===============
            ================================================ -->


            <!--/ Page Specific Scripts -->
            
           
            <script>
    $(window).load(function () {

        //initialize basic datatable
        var table = $('#basic-usage').DataTable({
            "ajax": 'assets/extras/datatables-basic.json',
            "columns": [
                {"data": "id"},
                {"data": "firstName"},
                {"data": "lastName"}
            ],
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': ["no-sort"]}
            ],
            "dom": 'Rlfrtip'
        });

        $('#basic-usage tbody').on('click', 'tr', function () {
            if ($(this).hasClass('row_selected')) {
                $(this).removeClass('row_selected');
            }
            else {
                table.$('tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            }
        });
        //*initialize basic datatable




        //initialize editable datatable

        function restoreRow(oTable, nRow) {
            var aData = oTable.row(nRow).data();
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.row(nRow).data(aData[i]);
            }

            oTable.draw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.row(nRow).data();
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[4] + '">';
            jqTds[5].innerHTML = '<a role="button" tabindex="0" class="edit text-success text-uppercase text-strong text-sm mr-10">Save</a><a role="button" tabindex="0" class="cancel text-warning text-uppercase text-strong text-sm mr-10">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.cell(nRow, 0).data(jqInputs[0].value);
            oTable.cell(nRow, 1).data(jqInputs[1].value);
            oTable.cell(nRow, 2).data(jqInputs[2].value);
            oTable.cell(nRow, 3).data(jqInputs[3].value);
            oTable.cell(nRow, 4).data(jqInputs[4].value);
            oTable.cell(nRow, 5).data('<a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10">Remove</a>');
            oTable.draw();
        }

        var table2 = $('#editable-usage');

        var oTable = $('#editable-usage').DataTable({
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': ["no-sort"]}
            ]
        });

        var nEditing = null;
        var nNew = false;

        $('#add-entry').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previous row is not saved yet. Save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.row(nEditing).remove().draw(); // cancel
                    nEditing = null;
                    nNew = false;

                    return;
                }
            }

            var aiNew = oTable.row.add(['', '', '', '', '', '', '']).draw();
            var nRow = oTable.row(aiNew[0]).node();
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table2.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            oTable.row(nRow).remove().draw();
            alert("Deleted!");
        });

        table2.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.row(nEditing).remove().draw();
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table2.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
                alert("Updated!");
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
        //*initialize editable datatable

        //initialize responsive datatable
        var table3 = $('#responsive-usage').DataTable({
            "ajax": 'assets/extras/datatables-responsive.json',
            "columns": [
                {"data": "id"},
                {"data": "firstName"},
                {"data": "lastName"},
                {"data": "tel"},
                {"data": "address"},
                {"data": "city"},
                {"data": "state"},
                {"data": "zip"}
            ],
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': ["no-sort"]}
            ]
        });
        //*initialize responsive datatable

        //initialize responsive datatable
        function stateChange(iColumn, bVisible) {
            console.log('The column', iColumn, ' has changed its status to', bVisible);
        }

        var table4 = $('#advanced-usage').DataTable({
            "ajax": 'assets/extras/datatables-basic.json',
            "columns": [
                {"data": "id"},
                {"data": "firstName"},
                {"data": "lastName"}
            ],
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': ["no-sort"]}
            ]
        });

        var colvis = new $.fn.dataTable.ColVis(table4);

        $(colvis.button()).insertAfter('#colVis');
        $(colvis.button()).find('button').addClass('btn btn-default').removeClass('ColVis_Button');

        var tt = new $.fn.dataTable.TableTools(table4, {
            sRowSelect: 'single',
            "aButtons": [
                'copy',
                'print', {
                    'sExtends': 'collection',
                    'sButtonText': 'Save',
                    'aButtons': ['csv', 'xls', 'pdf']
                }
            ],
            "sSwfPath": "assets/js/vendor/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
        });

        $(tt.fnContainer()).insertAfter('#tableTools');
        //*initialize responsive datatable

    });
            
            </script>





            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                (function (b, o, i, l, e, r) {
                    b.GoogleAnalyticsObject = l;
                    b[l] || (b[l] =
                            function () {
                                (b[l].q = b[l].q || []).push(arguments)
                            });
                    b[l].l = +new Date;
                    e = o.createElement(i);
                    r = o.getElementsByTagName(i)[0];
                    e.src = 'https://www.google-analytics.com/analytics.js';
                    r.parentNode.insertBefore(e, r)
                }(window, document, 'script', 'ga'));
                ga('create', 'UA-XXXXX-X', 'auto');
                ga('send', 'pageview');
            </script>

    </body>
</html>