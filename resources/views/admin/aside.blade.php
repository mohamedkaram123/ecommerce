
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper"> 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('/') }}/desighn/AdminPanelDesighn/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image ">
          <img src="{{ url('/') }}/desighn/AdminPanelDesighn/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ admin()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Dashboard
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>!-->

         
          <li class="nav-header text-{{leftable()}}">{{trans('admin.pages')}}</li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                {{trans('admin.admin')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('admin') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
              {{trans('admin.acounts')}}
              </p>
            </a>
          </li>
            </ul>
          </li>

          <li class="nav-header text-{{leftable()}}">{{trans('admin.users')}}</li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                {{trans('admin.users')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('users') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
              {{trans('admin.acountsusers')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ aurl('users?level=user') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
              {{trans('admin.user')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ aurl('users?level=company') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
              {{trans('admin.company')}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ aurl('users?level=vendor') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
              {{trans('admin.vendor')}}
              </p>
            </a>
          </li>
            </ul>
          </li>
       



                 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-flag"></i>
              <p>
                {{trans('admin.contries')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('contries') }}" class="nav-link">
              <i class="nav-icon fa fa-flag"></i>
              <p>
              {{trans('admin.contries')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('contries/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-flag-checkered"></i>
              <p>
                {{trans('admin.cites')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('cites') }}" class="nav-link">
              <i class="nav-icon fa fa-flag-checkered"></i>
              <p>
              {{trans('admin.cites')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('cites/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-building"></i>
              <p>
                {{trans('admin.state')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('state') }}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
              {{trans('admin.state')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('state/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-align-justify"></i>
              <p>
                {{trans('admin.department')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('department') }}" class="nav-link">
              <i class="nav-icon fas fa-align-justify"></i>
              <p>
              {{trans('admin.department')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('department/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-trademark"></i>
              <p>
                {{trans('admin.trademark')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('trademark') }}" class="nav-link">
              <i class="nav-icon fas fa-trademark"></i>
              <p>
              {{trans('admin.trademark')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('trademark/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                {{trans('admin.manufact')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('manufact') }}" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
              {{trans('admin.manufact')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('manufact/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>


          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dumpster-fire"></i>
              <p>
                {{trans('admin.mall')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('mall') }}" class="nav-link">
              <i class="nav-icon fas fa-dumpster-fire"></i>
              <p>
              {{trans('admin.mall')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('mall/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>



          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-palette"></i>
              <p>
                {{trans('admin.color')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('color') }}" class="nav-link">
              <i class="nav-icon fas fa-palette"></i>
              <p>
              {{trans('admin.color')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('color/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>



          


          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                {{trans('admin.size')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('size') }}" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
              {{trans('admin.size')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('size/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                {{trans('admin.weight')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('weight') }}" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
              {{trans('admin.weight')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('weight/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                {{trans('admin.product')}}
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ aurl('product') }}" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
              {{trans('admin.product')}}
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ aurl('product/create') }}" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
              {{trans('admin.add')}}
              </p>
            </a>
          </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="{{ url('admin/logout') }}" class="nav-link">
            <i class="nav-icon fa fa-door-closed"></i>
              <p>
              {{trans('admin.logout')}}
               
              </p>
            </a>
        
          </li>
          
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
