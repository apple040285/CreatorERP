@section("header")
<header class="topStatus">
    <div class="content-header d-flex justify-content-between align-items-center">
        <div class="content-header-menu">
            <a href="javascript:;" class="leftMenuBtn">
                <i class="fa fa-bars f20 cwh0"></i>
            </a>
        </div>
        <div class="content-header-title">
            <div class="titleFrame">
                <a href="javascript:;" class="tipBtn">
                    <span class="f20 fw700 cwh0">
                        @yield('tipTitle')
                    </span>
                </a>
            </div>
        </div>
        <div class="content-header-search">
            <div class="searchFrame">
                <a href="javascript:;" class="searchBtn cwh0 logOut">
                    <i class="f20 cwh0 fa fa-sign-out"></i>
                </a>
            </div>
        </div>
    </div>
</header>
<div class="leftMenu">
    @yield('leftMenu')
</div>
@overwrite