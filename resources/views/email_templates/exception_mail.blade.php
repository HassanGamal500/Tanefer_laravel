<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
</head>
<body>
    <div class="row">
        <div>
            Url: {!! $url !!}
            Env: {!! $environment !!}
        </div>
        <div>
            {!! $html !!}
{{--            Message: {{ json_decode($html,true)['message'] }}--}}
{{--            <br>--}}
{{--            Exception: {{ json_decode($html,true)['exception'] }}--}}
{{--            <br>--}}
{{--            File: {{ json_decode($html,true)['file'] }}--}}
{{--            <br>--}}
{{--            Line: {{ json_decode($html,true)['line'] }}--}}
{{--            <br>--}}
        </div>
    </div>
</body>
</html>



