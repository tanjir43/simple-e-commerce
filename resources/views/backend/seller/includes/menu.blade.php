<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('/')}}admin-assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">

                <div class="font-strong">{{ucfirst(auth('seller')->user()->full_name)}} <span>@if(auth('seller')->user()->is_verified) <i class="fa fa-check-circle text-success"  data-toggle="tooltip" title="verified" data-placement="bottom"></i> @else <i class="fa fa-user-times text-danger" data-toggle="tooltip" title="unverified" data-placement="bottom"></i>  @endif</span></div><small>Administrator</small></div>
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
                        <a href="{{route('seller-product.create')}}">Create Product</a>
                    </li>
                    <li>
                        <a href="{{route('seller-product.index')}}">Manage Product</a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</nav>

