<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('/')}}admin-assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">

                <div class="font-strong">{{ucfirst(auth('admin')->user()->full_name)}}</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href=""><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard <i class="fa"></i></span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-picture-o"></i>
                    <span class="nav-label">Banner management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('banner.create')}}">Create Banner</a>
                    </li>
                    <li>
                        <a href="{{route('banner.index')}}">Manage Banner</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-caret-square-o-up"></i>
                    <span class="nav-label">Category management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('category.create')}}">Create Category</a>
                    </li>
                    <li>
                        <a href="{{route('category.index')}}">Manage Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-braille"></i>
                    <span class="nav-label">Brand management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('brand.create')}}">Create Brand</a>
                    </li>
                    <li>
                        <a href="{{route('brand.index')}}">Manage Brand</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-product-hunt"></i>
                    <span class="nav-label">Products management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('product.create')}}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{route('product.index')}}">Manage Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-cart-plus"></i>
                    <span class="nav-label">Carts management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('order.index')}}">Manage Brand</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('order.index')}}"><i class="sidebar-item-icon fa fa-first-order"></i>
                    <span class="nav-label">Order management</span></a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-podcast"></i>
                    <span class="nav-label">Post Category</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="">Add Unit </a>
                    </li>
                    <li>
                        <a href="">Manage Unit </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-dollar"></i>
                    <span class="nav-label"> Currency Management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('currency.create')}}">Add Currency </a>
                    </li>
                    <li>
                        <a href="{{route('currency.index')}}">Manage Currency </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-tag"></i>
                    <span class="nav-label">Post tag</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="">Add Product</a>
                    </li>
                    <li>
                        <a href="">Manage Product </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="icons.html"><i class="sidebar-item-icon fa fa-magnet"></i>
                    <span class="nav-label">Post management</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-star"></i>
                    <span class="nav-label">Review management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="colors.html">Add User</a>
                    </li>
                    <li>
                        <a href="colors.html">Manage User</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-user-plus"></i>
                    <span class="nav-label">Seller management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
{{--                    <li>--}}
{{--                        <a href="colors.html">Add Seller</a>--}}
{{--                    </li>--}}
                    <li>
                        <a href="{{route('seller.index')}}">Manage Seller</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-commenting-o"></i>
                    <span class="nav-label">Comment management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="colors.html">Add User</a>
                    </li>
                    <li>
                        <a href="colors.html">Manage User</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-user"></i>
                    <span class="nav-label">User management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('users.create')}}">Add User</a>
                    </li>
                    <li>
                        <a href="{{route('users.index')}}">Manage User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-address-book"></i>
                    <span class="nav-label">About US</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('about_us.create')}}">Add about</a>
                    </li>
                    <li>
                        <a href="{{route('about_us.index')}}">Manage about</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-cc-discover"></i>
                    <span class="nav-label">Coupon management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('coupon.create')}}">Add coupon</a>
                    </li>
                    <li>
                        <a href="{{route('coupon.index')}}">Manage coupon</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-ship"></i>
                    <span class="nav-label">Shipping management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('shipping.create')}}">Add Shipping</a>
                    </li>
                    <li>
                        <a href="{{route('shipping.index')}}">Manage Shipping</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-magnet"></i>
                    <span class="nav-label">General Settings </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('settings')}}"> Settings</a>
                    </li>
                    <li>
                        <a href="{{route('smtp')}}">SMTP Settings</a>
                    </li>
                    <li>
                        <a href="{{route('payment')}}">Payment Settings</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
