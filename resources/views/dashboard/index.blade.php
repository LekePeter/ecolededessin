@extends('layouts.admin')

@section('content')
    <section>
        

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Projects</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{url('dashboard/show')}}">View</a>
            <a class="dropdown-item" href="{{url('dashboard/add')}}">Add</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="edit">Edit</a>
            <a class="dropdown-item" href="delete">Delete</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
            <i class="fas fa-calendar"></i>
            <span>Events</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-file"></i>
            <span>Records</span></a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">
            @include('inc.messages') 
            @yield('dash_content')

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
  </div>
</div>
</div>

    </section>
@endsection
