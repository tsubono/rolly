<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">基本機能</li>
        <li class="{{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ url('/admin') }}">
                <i class="fa fa-home"></i>
                <span>ホーム</span>
            </a>
        </li>
        <li class="{{ request()->is('admin/products', 'admin/products/*', 'admin/product-categories', 'admin/product-categories/*') ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-tag"></i>
                <span>商品管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ request()->is('admin/products') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/products') }}">
                        <span>商品一覧</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/products/create') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/products/create') }}">
                        <span>商品登録</span>
                    </a>
                </li>
            </ul>
        </li>
        {{--<li class="{{ request()->is('admin/orders', 'admin/orders/*') ? 'active' : '' }} treeview">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-shopping-cart"></i>--}}
                {{--<span>受注管理</span>--}}
                {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li class="{{ request()->is('admin/orders') ? 'active' : '' }} ">--}}
                    {{--<a href="{{ url('/admin/orders') }}">--}}
                        {{--<span>受注一覧</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="{{ request()->is('admin/orders/create') ? 'active' : '' }} ">--}}
                    {{--<a href="{{ url('/admin/orders/create') }}">--}}
                        {{--<span>受注登録</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        <li class="{{ request()->is('admin/users', 'admin/users/*') ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>会員管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ request()->is('admin/users') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/users') }}">
                        <span>会員一覧</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/users/create') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/users/create') }}">
                        <span>会員登録</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="header">設定</li>
        <li class="{{ request()->is('admin/setting/brands', 'admin/setting/brands/*') ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-tag"></i>
                <span>ブランド管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ request()->is('admin/setting/brands') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/setting/brands') }}">
                        <span>ブランド一覧</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->is('admin/setting/plans', 'admin/setting/plans/*') ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-jpy"></i>
                <span>プラン管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ request()->is('admin/setting/plans') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/setting/plans') }}">
                        <span>プラン一覧</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/setting/plan_details') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/setting/plan_details') }}">
                        <span>プラン詳細一覧</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->is('admin/admins', 'admin/admins/*') ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-key"></i>
                <span>管理スタッフ管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ request()->is('admin/admins') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/admins') }}">
                        <span>管理スタッフ一覧</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/admins/create') ? 'active' : '' }} ">
                    <a href="{{ url('/admin/admins/create') }}">
                        <span>管理スタッフ登録</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="{{ url('/admin/logout') }}">
                <i class="fa fa-sign-out"></i>
                <span>ログアウト</span>
            </a>
        </li>
    </ul>
</section>
