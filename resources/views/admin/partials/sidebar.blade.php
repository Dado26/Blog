 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset ('admin_assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
   
     
        <li class="{{ isActive('admin/posts',false, false) }}">
          <a href="{{route ('posts.index') }}">
            <i class="fa fa-th"></i> <span>Posts</span>
          </a>
        </li>
          <li class="{{ isActive('admin/comments',false, false) }}">
          <a href="{{route ('comments.index') }}">
            <i class="fa fa-comments"></i> <span>Coments</span>
          </a>
        </li>
          <li class="{{ isActive('admin/categories',false, false) }}">
          <a href="{{route ('categories.index') }}">
            <i class="fa fa-list"></i> <span>Categories</span>
          </a>
        </li>
        <li class="{{ isActive('admin/users', false, false) }}">
          <a href="{{route ('users.index') }}">
            <i class="fa fa-user"></i> <span>Users</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>