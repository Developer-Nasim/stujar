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
   <div>
        <div style="margin-bottom:20px;">
            <div style="margin-bottom:10px;">Name : {{ Crypt::decryptString(session()->get('name')) }} </div>
            <div style="margin-bottom:10px;">Email : {{ Crypt::decryptString(session()->get('email')) }} </div>
            <div style="margin-bottom:10px;">Phone: {{ session()->get('phone'); }}</div>
        </div>
        <a href="https://bcscomputercity.org/confirm_email/{{ session()->get('verification_code'); }}/{{ session()->get('email'); }}" style="background-image: linear-gradient(310deg,#ff5825,#e9730e,#ff5825);padding: 10px 30px; color:white;text-decoration: none;border-radius:3px;"> Confirm Your Email </a>
   </div>
</body>
</html>