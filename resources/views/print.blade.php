<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title></title>

    {{-- <meta name="description" content="created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow"> --}}

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="cAB1kjZba2u4PKNtbZtXB8B6jG23LkFqBayFkXCd"> --}}

    <!-- Icons -->
    {{-- <link rel="shortcut icon" href="http://test-c11103.creator-plus.com/media/favicons/favicon.png"> --}}
    {{-- <link rel="icon" sizes="192x192" type="image/png" href="http://test-c11103.creator-plus.com/media/favicons/favicon-192x192.png"> --}}
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="http://test-c11103.creator-plus.com/media/favicons/apple-touch-icon-180x180.png"> --}}
    {{-- <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      </head>
      <body>
        <h1>Hello, world!</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      </body>
    </html> --}}
    {{-- <link rel="stylesheet" id="css-main" href="http://test-c11103.creator-plus.com/css/codebase.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    <style>
        .content {
            margin: 0 auto;
            padding: 12px 12px 1px;
            width: 100%;
            overflow-x: visible;
        }

        body {
            background-color: #fff !important;
        }

        .a4 {
            width: 21cm;
        }

        table tr {
            line-height: 3em;
        }

        .print>div {
            /* min-height: 29.7cm; */
        }

        @media print {
            .not_print {
                display: none;
            }

            .print>div {
                margin-top: 50px;
                page-break-after: always;
            }

            .onlyA4 {
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    <main id="main-container">
        <div class="content a4">
            <div class="not_print">
                <div class="title btn btn-primary" onclick="printData()">列印</div>
            </div>
            <div class="print">
                <div class="interest">
                    <div>
                        <h3 class="text-center m-0">上穎科技有限公司</h3>
                        <h6 class="text-center">Shang Win Technology Co.,Ltd</h6>
                        <h6 class="text-right m-0" style="">74444 台南市新市區三舍里8之3號</h6>
                        <h6 class="text-right" style="">Tel：(06) 589-0845 Fax：(06) 589-0842</h6>
                        <h3 class="text-center">{{ $page_title }}</h3>

                        <div class="d-flex justify-content-between">
                            @foreach ($fields as $rows)
                                <div>
                                    @foreach ($rows as $rowIndex => $row)
                                        <div>{{ $rowIndex }} ：{{ $row }}</div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <table class="w-100 mb-4" border="1" cellpadding="3" cellspacing="1" style="border: 3px solid #000;">
                                <thead>
                                    <tr>
                                        <th scope="col">項次</th>
                                        <th scope="col">品名</th>
                                        <th scope="col">數量</th>
                                        <th scope="col">單位</th>
                                        <th scope="col">單價</th>
                                        <th scope="col">小計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item['product']['name'] }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>{{ $item['product']['unit'] }}</td>
                                            <td>{{ number_format($item['price'], 0) }}</td>
                                            <td>{{ number_format($item['amount'], 0) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td>未稅金額：</td>
                                        <td>{{ number_format($order['tax_excluding_amount'], 0) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td>稅金：</td>
                                        <td>{{ number_format($order['tax_amount'], 0) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">總金額：</th>
                                        <td colspan="3">{{ numberTo($order['total_amount']) }}整</td>
                                        <td>總 價：</td>
                                        <td>{{ number_format($order['total_amount'], 0) }}</td>
                                    </tr>
                                </tfoot>
                            </table>


                            <div class="mt-4">
                                {{-- <ul style="list-style-type: square;">
                                    <li>以上日期如遇假日，則順延至上班日匯款。</li>
                                    <li>傑苙股份有限公司於上開利息代收後，按期匯入下列指定帳號 : </li>
                                </ul> --}}

                                <div class="bank">
                                    <div class="row">
                                        <div class="col-sm-12 mb-4">備註 : {{ $order['remark'] }}</div>
                                        <div class="col-sm-12">承辦人員 : </div>
                                        <div class="col-sm-12">連絡電話 : </div>
                                        <div class="col-sm-12">E-mail : </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-6">
                                        <h6>客戶簽收：</h6>
                                        <div class="seal" style="width: 100%; border: 1px solid;">
                                            <img width="100%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAACICAYAAAAI5jVnAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGkSURBVHhe7dRBDQAgDAAx/KslJHsPIddHLfTcNws0CQDCBABhAoAwAUCYACBMABAmAAgTAIQJAMIEAGECgDABQJgAIEwAECYACBMAhAkAwgQAYQKAMAFAmAAgTAAQJgAIEwCECQDCBABhAoAwAUCYACBMABAmAAgTAIQJAMIEAGECgDABQJgAIEwAECYACBMAhAkAwgQAYQKAMAFAmAAgTAAQJgAIEwCECQDCBABhAoAwAUCYACBMABAmAAgTAIQJAMIEAGECgDABQJgAIEwAECYACBMAhAkAwgQAYQKAMAFAmAAgTAAQJgAIEwCECQDCBABhAoAwAUCYACBMABAmAAgTAIQJAMIEAGECgDABQJgAIEwAECYACBMAhAkAwgQAYQKAMAFAmAAgTAAQJgAIEwCECQDCBABhAoAwAUCYACBMABAmAAgTAIQJAMIEAGECgDABQJgAIEwAECYACBMAhAkAwgQAYQKAMAFAmAAgTAAQJgAIEwCECQDCBABhAoAwAUCYACBMABAmAAgTAIQJAMIEAGECgDABQJgAIEwAECYAyJr9izzOiHcwsu0AAAAASUVORK5CYII=" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="footer mt-4" style="text-align-last: justify;">
                                {{-- 中華民國 112年09月15日 --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <script>
        function printData() {
            window.print()
        }
        window.onload = function() {
            // printData()
        }

        $(function() {
            $(".custom-control-input").change(function() {
                let val = $(this).val();
                if ($(this).prop('checked')) {
                    $(`.${val}`).show();
                } else {
                    $(`.${val}`).hide();
                }
            });
        });
    </script>
</body>

</html>
