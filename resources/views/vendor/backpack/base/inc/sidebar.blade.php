@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/kategori') }}"><i class="fa fa-dashboard"></i> <span>Kategori</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/ukuran') }}"><i class="fa fa-dashboard"></i> <span>Ukuran</span></a></li>
          <li class="treeview">
                <a href="#"> <i class="fa fa-dashboard"></i><span>Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <<li><a href="#">Pre-order</a></li>
                    <li><a href="#">Ready Stock</a></li>
                </ul>
            </li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/metode') }}"><i class="fa fa-dashboard"></i> <span>Metode</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/testimoni') }}"><i class="fa fa-dashboard"></i> <span>Testimoni</span></a></li>
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
