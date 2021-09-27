<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Email</title>
</head>

<body>
    <div style="text-align:center;">
        Hello, {{ $name }} | <br>
        Thanks for creating account in our website. <br>
        Please click the below link to verify your email and active your accout.<br>
        <a href="{{ url('http://localhost:8000/verify?code='.$verification_code) }}">Click Here</a>
    </div>
</body>

</html>
