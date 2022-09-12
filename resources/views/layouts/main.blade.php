<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>大豐玩具</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/simple-line.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/iconfont.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        @yield('style')
    </head>
    <body class="bg-dark">
        <div id="mainFrame" class="mx-auto bg-white">
            @yield('header')
            <main id="main-container">
                <div class="py-4">
                    @yield('content')
                </div>
            </main>
        </div>
        @yield('footer')
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
        @yield('script')
        <script>
            // 左側選單開關
            $(".leftMenuBtn").click(function() {
                $(".leftMenu").toggleClass("show");
            });

            // 登入按鈕
            $(".logOut").click(function() {
                const url = "{{ route('login') }}";
                Swal.fire({
                    title: '確定要登出嗎?',
                    text: "確認後將跳轉登入頁面!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '確認',
                    cancelButtonText: '關閉'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = url;
                    }
                })
            });
        </script>
    </body>
</html>