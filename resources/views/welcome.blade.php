<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{asset('img/logodampasan.png')}}" rel="icon">
  <link href="{{asset('img/logodampasan.png')}}" rel="apple-touch-icon">

  <title>Welcome</title>
  <style>
    h1 {
      text-align: center;
    }
    a {
      text-align: center;
      display: block;
    }
    </style>
</head>
<body>
  <h1>- simplicity is the ultimate sophistication - </h1>
  <a href="{{route('register.student')}}" target="_blank"  style="text-align: center">Pendaftaran</a>
  <a href="{{route('login')}}" target="_blank"  style="text-align: center">Login</a>
</body>
</html>