@section("header")
<header class="topStatus">
    <div class="content-header d-flex justify-content-between align-items-center">
        <div class="content-header-menu">
            <a href="javascript:;" class="leftMenuBtn">
                <i class="f20 icon-menu cwh0"></i>
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
    </div>
</header>
<div class="leftMenu">
    @yield('leftMenu')
</div>
@overwrite