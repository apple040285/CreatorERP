<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <input type="text">
    <script>
        window.addEventListener('keydown', function(e) {
            console.log(e, 'window')
            console.log(e.code, e.which)
        }, false);

        document.addEventListener('keydown', function(e) {
            console.log(e, 'document')
            console.log(e.code, e.which)
        }, false);


    </script>
    <!-- V-console (偵錯用) -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vConsole/3.3.4/vconsole.min.js'></script>
    <script>
        var vConsole = new window.VConsole();
    </script>
</body>

</html>
