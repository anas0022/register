<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    section{
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
    }
    a{
        background-color:black;
        color:white;
        cursor: pointer;
       text-decoration:none;
    
    }
</style>
<body>
    <section>
<h1>Welcome, {{ $user->name }}!</h1>
<p>This is your dashboard.</p>
<a href="{{ route('logout') }}">Logout</a>
</section>
</body>
</html>