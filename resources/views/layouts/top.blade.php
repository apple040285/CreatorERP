@section("header")
<header class="topStatus">
    <div class="content-header d-flex justify-content-between align-items-center">
        <div class="content-header-menu">
            <a href="javascript:;" class="leftMenuBtn">
                <i class="fa fa-arrow-left f20 cwh0"></i>
            </a>
        </div>
        <div style="text-align: center;width:100%;">
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
                <a href="#" class="searchBtn cwh0">
                    <i class="fa fa-user f20 cwh0"></i>
                </a>
            </div>
        </div>
    </div>
</header>
<div class="leftMenu">
    @yield('leftMenu')
</div>
@overwrite