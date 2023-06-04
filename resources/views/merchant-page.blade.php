<!DOCTYPE html>
<html>
<head>
    <title>Payment redirect page</title>
</head>
<body>
<form method="post" action="{{ $redirectUrl }}" id="frm" name="frm">
    @foreach($requestParams as $name => $value)
        <input type="hidden" name="{{ htmlentities($name) }}" value="{{ htmlentities($value) }}">
    @endforeach
    <button type="submit" style="display:none;"></button>
</form>
<script>
    window.onload = function () {
        document.getElementById('frm').submit();
    };
</script>
</body>
</html>