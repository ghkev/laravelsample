<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
</head>
<body>
    <h2>Dashboard</h2>
    <a href="{{ url('logout') }}">Sign-Out</a><br><br>
    <a href="{{ url('users') }}"><button type="button">Click to view Users</button></a>
</body>
</html>