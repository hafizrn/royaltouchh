<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

<!-- LOGO -->
<div class="topbar-left">
    <div class="">
        <!--<a href="index" class="logo text-center">Admiria</a>-->
        <a href="{{ route('home') }}" class="logo"><img src="{{ URL::asset('assets/images/logo-sm.png') }}" height="36" alt="logo"></a>
    </div>
</div>
<div class="sidebar-inner slimscrollleft">
    <div id="sidebar-menu">
        <ul>
            <li class="menu-title">Main </li>
            <li>
                <a href="{{ route('home') }}" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span> Dahboard </span></a>
            </li>
            <li>
                <a href="{{ route('employee') }}" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span> Employee </span></a>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email-outline"></i><span> Salary Management <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="/employee/salary_assign">Salary Generate</a></li>
                    <li><a href="/employee/salary_update">Update Salary Range</a></li>
                    <li><a href="/employee/salary_history">Salary History</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email-outline"></i><span> Product Management <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="/product_category">Product Category</a></li>
                    <li><a href="/product_type">Product Type</a></li>
                    <li><a href="/product">Products</a></li>
                    <li><a href="/product_stock">Stock</a></li>
                    <li><a href="/product_vendor">Vendor</a></li>
                    <li><a href="/product_purchase">Purchase</a></li>
                    <li><a href="/product_sell">Sell</a></li>
                </ul>
            </li>
            <li class="menu-title">Help & Support</li>
            <li>
                <a href="#" class="waves-effect"><i class="mdi mdi-help-circle"></i><span> FAQ </span></a>
            </li>
            <li>
                <a href="#" class="waves-effect"><i class="mdi mdi-headset"></i><span> Contact <span class="badge badge-pill badge-warning pull-right">3</span> </span></a>
            </li>
            <li>
                <a href="#" class="waves-effect"><i class="mdi mdi-file-document-box"></i><span> Documentation </span></a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
