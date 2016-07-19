<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{--<div class="user-panel">--}}
        {{--<div class="pull-left image">--}}
        {{--<img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />--}}
        {{--</div>--}}
        {{--<div class="pull-left info">--}}
        {{--<p>Alexander Pierce</p>--}}
        {{--<!-- Status -->--}}
        {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
        {{--</div>--}}
        {{--</div>--}}

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            {{--<li class="header">HEADER</li>--}}
            <!-- Optionally, you can add icons to the links -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>客户</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/admin/users/person')}}"><i class="fa fa-circle-o"></i><span>个人客户</span></a></li>
                    <li><a href="{{url('/admin/users/societe')}}"><i class="fa fa-circle-o"></i>专业客户</a></li>
                    {{--<li><a href="{{url('admin/users/create')}}"><i class="fa fa-circle-o"></i>建立客户</a></li>--}}
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>产品</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/products')}}"><i class="fa fa-circle-o"></i><span>Product</span></a></li>
                    <li><a href="{{url('admin/products/new')}}"><i class="fa fa-circle-o"></i>添加产品</a></li>
                    <li><a href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i>添加产品分类</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{url('admin/attribute')}}">产品属性</a>
            </li>
            <li class="treeview">
                <a href="{{url('admin/finish-time')}}"><i class="fa fa-clock-o" aria-hidden="true"></i>
                    完成时间</a>
            </li>
                <li class="treeview">
                    <a href="{{url('admin/pro')}}">产品折扣</a>
                </li>
                <li class="treeview">
                    <a href="{{url('admin/orders')}}">订单</a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/admin/orders')}}"><i class="fa fa-circle-o"></i>专业客户订单</a></li>
                        <li><a href="{{url('/admin/category')}}"><i class="fa fa-circle-o"></i>个人客户订单</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="{{url('/admin/livraison')}}">送货地址及价格</a>
                </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>