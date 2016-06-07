<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->



    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ScoreCard FileUpload</title>
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

        <!-- blueimp Gallery styles -->
        <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="{{ url('assets/js/vendor/file-upload/css/jquery.fileupload.css')}}">
        <link rel="stylesheet" href="{{ url('assets/js/vendor/file-upload/css/jquery.fileupload-ui.css')}}">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link rel="stylesheet" href="{{ url('assets/js/vendor/file-upload/css/jquery.fileupload-noscript.css')}}"></noscript>
        <noscript><link rel="stylesheet" href="{{ url('assets/js/vendor/file-upload/css/jquery.fileupload-ui-noscript.css')}}"></noscript>

        <!-- project main css files -->
        <link rel="stylesheet" href="{{ url('assets/css/main.css')}}">
        <!--/ stylesheets -->



        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="{{ url('assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
        <!--/ modernizr -->




    </head>





    <body id="minovate" class="appWrapper">






        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->












        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsitions">






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
                                                    <li><a href="{{url('/fileupload')}}"><i class="fa fa-caret-right"></i>Upload New</a></li>
                                                    <li><a href="{{url('/scorecards')}}"><i class="fa fa-caret-right"></i>View</a></li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-pencil"></i> <span>Parameters</span></a>
                                                <ul>
                                                    <li><a href="{{url('/categories')}}"><i class="fa fa-caret-right"></i> Scoring Categories</a></li>
                                                    <li><a href="{{url('/scorecardparams')}}"><i class="fa fa-caret-right"></i> Scorecard Parameters</a></li>
                                                    <li><a href="{{url('/weights')}}"><i class="fa fa-caret-right"></i> Scoring Weights</a></li>
                                                    <li><a href="{{url('/')}}"><i class="fa fa-caret-right"></i> System Parameters</a></li>

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

            </div>
            <!--/ CONTROLS Content -->




            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
            <section id="content">

                <div class="page page-forms-upload">

                    <div class="pageheader">

                    </div>

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <!-- tile -->
                            <section class="tile tile-simple">



                                <!-- tile body -->
                                <div class="tile-body">
                                    @if (session('message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!!! </strong>{{ session('message') }}
                                    </div>
                                    @endif

                                    @if (session('fail'))
                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Failure!!!</strong> {{ session('message') }}.
                                    </div>
                                    @endif
                                    <!-- The file upload form used as target for the file upload widget -->
                                    <!--<form role="form" method="POST" action="{{ url('/fileupload') }}" enctype="multipart/form-data">-->
                                    <form id="fileupload" action="{{url('/fileupload')}}" method="POST" enctype="multipart/form-data">
                                        <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                        <!--<noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>-->
                                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                        <div class="form-group">
                                            <label for="categoryname">Template Name</label>
                                            <select name="categoryname" class="form-control mb-0">
                                                @foreach ($params as $index)
                                                <option>{{$index->id." - ".$index->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Score Card Name</label>
                                            <input type="text" name="scorecardname" value="" class="form-control" id="exampleInputEmail1" placeholder="Category Name" required="">
                                        </div>
                                        <div class="row fileupload-buttonbar">
                                            <div class="col-lg-7">
                                                <!-- The fileinput-button span is used to style the file input field as button -->

                                                <span class="btn btn-success fileinput-button">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    <span>Add files...</span>
                                                    <input type="file" name="files[]" multiple>
                                                </span>
                                                <button type="submit" class="btn btn-primary start">
                                                    <i class="glyphicon glyphicon-upload"></i>
                                                    <span>Start upload</span>

                                                </button>

                                                <button type="button" class="btn btn-danger delete">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                                <input type="submit" name="" value="Submit" class="btn btn-success fileinput-button">
                                                <label class="checkbox checkbox-custom-alt checkbox-custom-lg inline-block ml-10">
                                                    <input type="checkbox" class="toggle"><i></i>
                                                </label>
                                                <!-- The global file processing state -->
                                                <span class="fileupload-process"></span>
                                            </div>
                                            <!-- The global progress state -->
                                            <div class="col-lg-5 fileupload-progress fade">
                                                <!-- The global progress bar -->
                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                                </div>
                                                <!-- The extended global progress state -->
                                                <div class="progress-extended">&nbsp;</div>
                                            </div>
                                        </div>
                                        <!-- The table listing the files available for upload/download -->
                                        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <?php echo csrf_field(); ?>

                                    </form>
                                    <br>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Notes</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul>
                                                <li>The maximum file size for uploads in this demo is <strong>5 MB</strong> (default file size is unlimited).</li>
                                                <li>Only CSV files (<strong>CSV</strong>) are allowed in this demo (by default there is no file type restriction).</li>
                                                <li>Uploaded files will be deleted automatically after <strong>5 minutes</strong> (demo setting).</li>
                                                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage </li>

                                            </ul>
                                        </div>
                                    </div>




                                    <!-- The blueimp Gallery widget -->
                                    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                                        <div class="slides"></div>
                                        <h3 class="title"></h3>
                                        <a class="prev">‹</a>
                                        <a class="next">›</a>
                                        <a class="close">×</a>
                                        <a class="play-pause"></a>
                                        <ol class="indicator"></ol>
                                    </div>

                                    <!-- The template to display files available for upload -->
                                    <script id="template-upload" type="text/x-tmpl">
                                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                                        <tr class="template-upload fade">
                                        <td>
                                        <span class="preview"></span>
                                        </td>
                                        <td>
                                        <p class="name nomargin">{%=file.name%}</p>
                                        <strong class="error text-danger"></strong>
                                        </td>
                                        <td class="upload">
                                        <div class="progress-list">
                                        <div class="details">
                                        <div class="title">&nbsp;</div>
                                        <div class="description">Upload progress</div>
                                        </div>
                                        <div class="status pull-right">
                                        <span class="animate-number size" data-value="0" data-animation-duration="1500">Processing...</span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="progress progress-striped active progress-xs nomargin" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                                        </div>

                                        </td>
                                        <td class="text-right actions">
                                        {% if (!i && !o.options.autoUpload) { %}
                                        <button class="btn btn-success start btn-sm" disabled>
                                        <i class="fa fa-upload"></i>
                                        <span> Start</span>
                                        </button>
                                        {% } %}
                                        {% if (!i) { %}
                                        <button class="btn btn-warning cancel btn-sm">
                                        <i class="fa fa-times"></i>
                                        <span> Cancel</span>
                                        </button>
                                        {% } %}
                                        </td>
                                        </tr>
                                        {% } %}
                                    </script>

                                    <!-- The template to display files available for download -->
                                    <script id="template-download" type="text/x-tmpl">
                                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                                        <tr class="template-download fade">
                                        <td>
                                        <span class="preview">
                                        {% if (file.thumbnailUrl) { %}
                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                                        {% } %}
                                        </span>
                                        </td>
                                        <td>
                                        <p class="name nomargin">
                                        {% if (file.url) { %}
                                        <a href="{%=file.url%}" class="white" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                                        {% } else { %}
                                        <span>{%=file.name%}</span>
                                        {% } %}
                                        </p>
                                        {% if (file.error) { %}
                                        <div><span class="label label-red">Error</span> {%=file.error%}</div>
                                        {% } %}
                                        </td>
                                        <td>
                                        <span class="size">{%=o.formatFileSize(file.size)%}</span>
                                        </td>
                                        <td class="text-right actions">
                                        {% if (file.deleteUrl) { %}
                                        <label class="checkbox checkbox-custom-alt checkbox-custom inline-block">
                                        <input type="checkbox" id="delete-{%=file.name%}" class="toggle"><i></i>
                                        </label>
                                        <button class="btn btn-danger btn-sm delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                        <i class="fa fa-trash-o"></i>
                                        <span> Delete</span>
                                        </button>
                                        {% } else { %}
                                        <button class="btn btn-warning btn-sm cancel">
                                        <i class="fa fa-times"></i>
                                        <span> Cancel</span>
                                        </button>
                                        {% } %}
                                        </td>
                                        </tr>
                                        {% } %}
                                    </script>

                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->
                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->

                </div>

            </section>
            <!--/ CONTENT -->






        </div>
        <!--/ Application Content -->














        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="{{url('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>

        <script src="{{url('assets/js/vendor/jRespond/jRespond.min.js')}}"></script>

        <script src="{{url('assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>

        <script src="{{url('assets/js/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <script src="{{url('assets/js/vendor/animsition/js/jquery.animsition.min.js')}}"></script>

        <script src="{{url('assets/js/vendor/screenfull/screenfull.min.js')}}"></script>

        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="{{url('assets/js/vendor/file-upload/js/vendor/jquery.ui.widget.js')}}"></script>
        <!-- The Templates plugin is included to render the upload/download listings -->
        <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
        <!-- blueimp Gallery script -->
        <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="{{url('assets/js/vendor/file-upload/js/jquery.iframe-transport.js')}}"></script>
        <!-- The basic File Upload plugin -->
        <script src="{{url('assets/js/vendor/file-upload/js/jquery.fileupload.js')}}"></script>
        <!-- The File Upload processing plugin -->
        <script src="{{url('assets/js/vendor/file-upload/js/jquery.fileupload-process.js')}}"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="{{url('assets/js/vendor/file-upload/js/jquery.fileupload-image.js')}}"></script>
        <!-- The File Upload audio preview plugin -->
        <script src="{{url('assets/js/vendor/file-upload/js/jquery.fileupload-audio.js')}}"></script>
        <!-- The File Upload video preview plugin -->
        <script src="{{url('assets/js/vendor/file-upload/js/jquery.fileupload-video.js')}}"></script>
        <!-- The File Upload validation plugin -->
        <script src="{{url('assets/js/vendor/file-upload/js/jquery.fileupload-validate.js')}}"></script>
        <!-- The File Upload user interface plugin -->
        <script src="{{url('assets/js/vendor/file-upload/js/jquery.fileupload-ui.js')}}"></script>

        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="{{url('assets/js/main.js')}}"></script>
        <!--/ custom javascripts -->






        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
$(window).load(function () {


    /*
     * jQuery File Upload Plugin JS Example 8.9.1
     * https://github.com/blueimp/jQuery-File-Upload
     *
     * Copyright 2010, Sebastian Tschan
     * https://blueimp.net
     *
     * Licensed under the MIT license:
     * http://www.opensource.org/licenses/MIT
     */

    /* global $, window */

    $(function () {
        'use strict';

        // Initialize the jQuery File Upload widget:
        $('#fileupload').fileupload({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: 'assets/js/vendor/file-upload/server/php/index.php'
        });

        // Enable iframe cross-domain access via redirect option:
        $('#fileupload').fileupload(
                'option',
                'redirect',
                window.location.href.replace(
                        /\/[^\/]*$/,
                        'assets/js/vendor/file-upload/cors/result.html?%s'
                        )
                );

        if (window.location.hostname === 'blueimp.github.io') {
            $('#fileupload').fileupload('option', {
                url: '//jquery-file-upload.appspot.com/',
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                disableImageResize: /Android(?!.*Chrome)|Opera/
                        .test(window.navigator.userAgent),
                maxFileSize: 5000000,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
            });
            // Upload server status check for browsers with CORS support:
            if ($.support.cors) {
                $.ajax({
                    url: '//jquery-file-upload.appspot.com/',
                    type: 'HEAD'
                }).fail(function () {
                    $('<div class="alert alert-danger"/>')
                            .text('Upload server currently unavailable - ' +
                                    new Date())
                            .appendTo('#fileupload');
                });
            }
        } else {
            // Load existing files:
            $('#fileupload').addClass('fileupload-processing');
            $.ajax({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                url: $('#fileupload').fileupload('option', 'url'),
                dataType: 'json',
                context: $('#fileupload')[0]
            }).always(function () {
                $(this).removeClass('fileupload-processing');
            }).done(function (result) {
                $(this).fileupload('option', 'done')
                        .call(this, $.Event('done'), {result: result});
            });
        }

    });



});
        </script>
        <!--/ Page Specific Scripts -->







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
