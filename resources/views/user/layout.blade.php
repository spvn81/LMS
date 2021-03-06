<!DOCTYPE html>
<html lang="en">


@php
use App\Helpers\CustomBackEnd;
@endphp


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | @yield('page_title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <!-- custome css  -->
    <link rel="stylesheet" href="{{ asset('custom.css') }}">

</head>

<body class="hold-transition sidebar-mini">




    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                {{--  <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>  --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <a href="{{ url('/my-account') }}">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    @if(!empty(Auth::user()->avatar))
                    <div class="image">
                        <img src="{{ url('storage/'. Auth::user()->avatar) }}" class="img-circle elevation-2"  alt="User Image" style="width: 50px; height:50px">
                    </div>
                    @else
                    <div class="image">
                        <img src="{{ asset('dist/img/noimage.png') }}" class="img-circle elevation-2"  alt="User Image" style="width: 50px; height:50px">
                    </div>
                    @endif

                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->email }}</a>
                    </div>
                </div>
            </a>


                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->


                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->

                        @can('dashboard')
                        <li class="nav-item">
                            <a href="{{ url('dashboard') }}" class="nav-link @yield('linkste-dashboard')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @endcan







                        @can('online_classes')
                        <li class="nav-item  ">
                            <a href="#" class="nav-link   @yield('linkste-create-class')">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    online classes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            @can('create_class')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('create-class') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create class</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan

                        </li>
                        @endcan










                        {{--  @can('join_meeting')
                        <li class="nav-item">
                            <a href="#" class="nav-link   @yield('Join-Meeting')">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    Join Meeting
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            @php
                            $cat_data = CustomBackEnd::getCategories();
                            @endphp


                            @foreach ( $cat_data as $cat_data_show )

                            @php
                            $encUrl = urlencode($cat_data_show->categories_slug);
                            $url = str_replace('+','-',$encUrl);
                            @endphp
                            @if($cat_data_show->category_type=='online_meeting')


                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ url($url) }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $cat_data_show->categories }}</p>
                                    </a>
                                </li>

                            </ul>
                            @endif

                            @endforeach
                        </li>
                        @endcan  --}}



                        @can('users')

                        <li class="nav-item">
                            <a href="#" class="nav-link  @yield('manage-users')">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create_users')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('create-user') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create User</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan

                        </li>
                        @endcan



                        @can('roles_and_permissions')

                        <li class="nav-item">
                            <a href="#" class="nav-link  @yield('roles_permissions')">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Roles & permissions
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                @can('create_roles')
                                <li class="nav-item">
                                    <a href="{{ url('create-roles') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Roles</p>
                                    </a>
                                </li>
                                @endcan


                                @can('permissions')

                                <li class="nav-item">

                                    <a href="{{ url('role-permissions') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>permissions</p>
                                    </a>
                                </li>
                                @endcan




                            </ul>

                        </li>
                        @endcan


                        @can('web_site')
                        <li class="nav-item">
                            <a href="#" class="nav-link   @yield('linkste-web')">
                                <i class="nav-icon fas fa-blog"></i>

                                <p>
                                    Web
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>


                            @can('menu')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('menu') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>menu</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan



                            @can('create_page')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('create-page') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create page</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan

                        </li>
                        @endcan











                        @can('app_notifications')
                        <li class="nav-item">
                            <a href="#" class="nav-link   @yield('linkste-appnotifications')">
                                <i class="nav-icon far fa-bell"></i>

                                <p>
                                    App notifications
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>


                            @can('notifications')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('notifications') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>notifications</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan





                        </li>
                        @endcan









                        @can('videos')
                        <li class="nav-item">
                            <a href="#" class="nav-link   @yield('linkste-video')">

                                <i class="nav-icon fas fa-video"></i>

                                <p>
                                    Videos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>



                            @can('video_category')

                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('video-category') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan


                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('videos') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Go to portal</p>
                                    </a>
                                </li>
                            </ul>


                        </li>
                        @endcan










                        @can('packages')
                        <li class="nav-item">
                            <a href="#" class="nav-link   @yield('packages')">

                                <i class="nav-icon fas fa-box"></i>

                                <p>
                                    manage packages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>



                            @can('categories')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('categories') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>categories</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan




                            @can('create_plan')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('create-plan') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create plan</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan

                            @can('create_plan_features')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('create-plan-features') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create plan features</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan


                        </li>
                        @endcan





                        @can('manage_files')
                        <li class="nav-item">
                            <a href="#" class="nav-link   @yield('linkste-manage-files')">

                                <i class="nav-icon far fa-file"></i>

                                <p>
                                    Manage files
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            @can('upload_media')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="{{ url('upload-media') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Upload Media</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan

                        </li>
                        @endcan









                        <li class="nav-item">
                            <a href="{{ url('logout') }}" class="nav-link @yield('link_ste_logout')">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Log Out
                                </p>
                            </a>
                        </li>




                    </ul>
                </nav>













                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('main_title') </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">@yield('main_title_active')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>


            <!-- /.content-header -->

            <!-- Main content -->


            @section('main_section')

            @show

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>





    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>



    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <!-- Ekko Lightbox -->
    <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{{ asset('plugins/laravel-file-uploader.js') }}"></script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>


<!-- Select2 -->
<script src="{{ asset('/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>



<script src="{{ asset('custom.js') }}"></script>


    @stack('backend_scripts')







</body>

</html>
