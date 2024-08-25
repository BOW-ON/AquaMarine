<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- asset은 기본 값이 resources로 돼있음 --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>AquaMarine</title>
</head>
<body>
    <div id="app">
        <App-Component></App-Component>
    </div>
</body>
</html>