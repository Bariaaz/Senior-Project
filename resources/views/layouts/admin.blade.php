<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('fonts/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>H</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin Home</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-caret-down"></i> {{Auth::user()->username}}
              </a>
              <ul class="dropdown-menu dropdown-user">
                  <li>
                    <a href="{{ route('logout') }}">
                      Logout
                  </a>
                  </li>
              </ul>
              <!-- /.dropdown-user -->
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!-- Users subList -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i>Students
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ url('admin/students') }}"><i class="fa fa-circle-o"></i>All Students</a></li>
                      <li><a href="{{ url('admin/students/create') }}"><i class="fa fa-circle-o"></i>Add Student</a></li>
                      <li><a href="{{ url('admin/studentSearch') }}"><i class="fa fa-circle-o"></i>Search</a></li>
                    </ul>
                </li>
              <li>
                <a href="#"><i class="fa fa-circle-o"></i>Instructors
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('admin/instructors') }}"><i class="fa fa-circle-o"></i>All Instructors</a></li>
                  <li><a href="{{ url('admin/instructors/create') }}"><i class="fa fa-circle-o"></i>Add Instructor</a></li>
                </ul>
              </li>
              <li>
                  <a href="#"><i class="fa fa-circle-o"></i>Admins
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <li><a href="{{url('admin/admins')}}"><i class="fa fa-circle-o"></i>All Admins</a></li>
                    <li><a href="{{url('admin/admins/create')}}"><i class="fa fa-circle-o"></i>Create Admin</a></li>
                  </ul>
              </li>
            </ul>


            <!-- Courses SubList -->
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Courses</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('admin/courses') }}"><i class="fa fa-circle-o"></i>All Courses</a></li>
                  <li><a href="{{ url('admin/courses/create') }}"><i class="fa fa-circle-o"></i>Create Course</a></li>
                  <li><a href="{{ url('admin/attreport') }}"><i class="fa fa-circle-o"></i>Reports</a></li>
                </ul>
              </li>

              <!-- Groups SubList -->
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-dashboard"></i> <span>Groups</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ url('admin/groups') }}"><i class="fa fa-circle-o"></i>All Groups</a></li>
                      <li><a href="{{ url('admin/groups/create') }}"><i class="fa fa-circle-o"></i>Create Group</a></li>
                      <li>
                        <a href="#"><i class="fa fa-circle-o"></i>Scheduals
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="{{ url('admin/scheduals') }}"><i class="fa fa-circle-o"></i>All Scheduals</a></li>
                          <li><a href="{{ url('admin/scheduals/create') }}"><i class="fa fa-circle-o"></i>Add Schedual</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                  <!-- Exams SubList -->
                  <li class="treeview">
                        <a href="#">
                          <i class="fa fa-dashboard"></i> <span>Exams</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="{{ url('admin/exams') }}"><i class="fa fa-circle-o"></i>All Exams</a></li>
                          <li><a href="{{ url('admin/exams/create') }}"><i class="fa fa-circle-o"></i>Add Exam</a></li>
                        </ul>
                  </li>
                  
                  <!-- Years SubList -->
                  <li class="treeview">
                      <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Years</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{{ url('admin/years') }}"><i class="fa fa-circle-o"></i>All Years</a></li>
                        <li><a href="{{ url('admin/years/create') }}"><i class="fa fa-circle-o"></i>Add Year</a></li>
                      </ul>
                </li>
                
                  
                  <!-- Grades section -->
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-dashboard"></i> <span>Grades</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ url('admin/groupsGrades') }}"><i class="fa fa-circle-o"></i>All Groups</a></li>
                    </ul>
                </li>  
                 
                <!-- Semesters/Majors/Languages/Years -->
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Others</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('admin/majors') }}"><i class="fa fa-circle-o"></i>Majors</a></li>
                    <li><a href="{{ url('admin/languages') }}"><i class="fa fa-circle-o"></i>Languages</a></li>
                    <li><a href="{{ url('admin/semesters') }}"><i class="fa fa-circle-o"></i>Semesters</a></li>
                  </ul>
                </li>



      </ul>
    </div>
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="container">
          @yield('content')
      </section>
  </div>
</div>
 
  
  <!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script> 
<!-- SlimScroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>  
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/app.min.js')}}"></script> 
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script> 
</body>
