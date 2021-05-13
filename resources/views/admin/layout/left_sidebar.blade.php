<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{route('admin.dashboard1')}}"><i class="fa fa-dashboard text-red"></i> <span>Dashboard</span></a></li>
            <li><a href="{{route('admin.permission')}}"><i class="fa fa-user text-red"></i> <span>Permission</span></a></li>
            <li><a href="{{route('admin.userinfo')}}"><i class="fa fa-user text-red"></i> <span>Bloggers</span></a></li>
            <li><a href="{{route("admin.datatable")}}"><i class="fa fa-rss text-red"></i> <span>Blogs</span></a></li>
            <li><a href="{{route("category.index")}}"><i class="fa fa-th text-red"></i> <span>Category</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
