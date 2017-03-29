<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo base_url().'assets/'; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>

<!-- search form -->
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>
<!-- /.search form -->

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li>
        <a href="<?php echo site_url('adminweb/dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('adminweb/users');?>">
            <i class="fa fa-users"></i> <span>Users</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
             <span>Posts</span>
            <span class="label label-primary pull-right">4</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo site_url('adminweb/posts');?>"><i class="fa fa-circle-o"></i> Posts</a></li>
            <li><a href="<?php echo site_url('adminweb/categories');?>"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Tags</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Comments</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
             <span>Layout Options</span>
            <span class="label label-primary pull-right">4</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo site_url('adminweb/pages');?>"><i class="fa fa-circle-o"></i> Pages</a></li>
            <li><a href="<?php echo site_url('adminweb/boxed');?>"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
    </li>
    <li class="header"></li>
    <li>
        <a href="<?php echo site_url('adminweb/logout');?>">
            <i class="fa fa-power-off"></i> <span>Logout</span>
        </a>
    </li>
</ul>