<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BCS Computer City</title>
</head>
<body>
    <h1 style="margin-bottom:20px"> BCS Computer City</h1>
    <div style="margin-bottom:15px;">
        <div style="margin-bottom:10px;"> Name : {{ session()->get('name') }}</div>
        <div style="margin-bottom:10px;"> Email : <b>{{ session()->get('email') }}</b></div>
        <div style="margin-bottom:10px;"> Phone: {{ session()->get('phone'); }} </div>
        <div style="margin-bottom:10px;"> Subject:{{ session()->get('subject'); }} </div>
        <div style="margin-bottom:10px;"> Message:{{ session()->get('message'); }} </div>
    </div>
</body>
</html>