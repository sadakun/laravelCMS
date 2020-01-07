<aside class="main-sidebar sidebar-light-olive elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/logo/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-0 mb-1 d-flex">
        <div class="image user-block">
          <img src="{{Auth::user()->photo->file}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><b>{{ Auth::user()->name }}</b>
            <small>as</small><br>a
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

          <!--dashboard sidebar -->
          <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!--end dashboard sidebar -->

          <!--user sidebar -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!--user submenu-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
            <!--end user submenu-->
          </li>
          <!--end post sidebar-->

          <!--post sidebar -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign"></i>
              <p>
                Post
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!--post submenu-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('posts.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('posts.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Post</p>
                </a>
              </li>
            </ul>
            <!--end post submenu-->
          </li>
          <!--end post sidebar-->

          <!--comment sidebar -->
          <li class="nav-item">
            <a href="{{route('comments.index')}}" class="nav-link">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>Comments</p>
            </a>
          </li>
          <!--end comment sidebar-->

          <!--reply sidebar -->
          <li class="nav-item">
            <a href="{{route('replies.index')}}" class="nav-link">
              <i class="nav-icon fas fa-comment-dots"></i>
              <p>Replies</p>
            </a>
          </li>
          <!--end comment sidebar-->

          <!--category sidebar -->
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>Categories</p>
            </a>
          </li>
          <!--end category sidebar-->

          <!--media sidebar -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-photo-video"></i>
              <p>
                Media
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!--media submenu-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('media.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('media.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Files</p>
                </a>
              </li>
            </ul>
            <!--end media submenu-->
          </li>
          <!--end media sidebar-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>