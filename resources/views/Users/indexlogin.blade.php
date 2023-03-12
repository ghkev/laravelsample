<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Homepage</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div>
        <h2>Sign-In</h2>

        @if(Session::has('fail'))
            <span class="error">{{ Session::get('fail') }}</span><br><br>
        @endif

        <form action="{{ url('login') }}" method="post">
            @csrf
            <label>Username: </label>
            <input type="text" name="username" value="{{ old('username') }}">
            &nbsp;<span class="error">@error('username')* {{ $message }}@enderror</span><br><br>
            <label>Password: </label>
            <input type="password" name="password">
            &nbsp;<span class="error">@error('password')* {{ $message }}@enderror</span><br><br>
            <input type="submit" value="Login">&nbsp;&nbsp;
            <a href="{{ url('registration') }}">Create account</a>
        </form>
    </div>
</body>
</html>