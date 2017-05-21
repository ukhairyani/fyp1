<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="{{ asset('css/starrr.css') }}">
    </head>
    <body>
        <div class='starrr'></div>
        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
        <script src="{{ asset('js/starrr.js') }}" charset="utf-8"></script>
        $rating = 4;
        <script type="text/javascript">
            $(document).ready(function () {
                $('.starrr').starrr({
                    rating: 4
                });
            });
        </script>
    </body>
</html>
