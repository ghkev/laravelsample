<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        .error{
            color: red;
        }
        .success{
            color: green;
        }
        .txtreq{
            color: red;
        }
    </style>
</head>
<body>
    <a href="{{ url('index') }}"><input type="button" value="< Back"></a>
        <div>
            <h2>Create Account</h2>
                @if (Session::has('success'))
                    <span class="success"> {{ Session::get('success') }}</span><br><br>
                @endif
                @if (Session::has('fail'))
                    <span class="error">{{ Session::get('fail') }}</span><br><br>
                @endif
            <span class="txtreq">* required field</span><br><br>

            <form action="{{ url('registered') }}" method="post">
                @csrf
                <label>Name: </label>
                <input type="text" name="name" value="{{ old('name') }}">&nbsp;<span class="txtreq">*</span>
                &nbsp;<span class="error">@error('name'){{ $message }}@enderror</span><br><br>

                <label>Email: </label>
                <input type="text" name="email" value="{{ old('email') }}">&nbsp;<span class="txtreq">*</span>
                &nbsp;<span class="error">@error('email'){{ $message }}@enderror</span><br><br>

                <label>Username: </label>
                <input type="username" name="username" value="{{ old('username') }}">&nbsp;<span class="txtreq">*</span>
                &nbsp;<span class="error">@error('username'){{ $message }}@enderror</span><br><br>

                <label>Password: </label>
                <input type="password" name="password">&nbsp;<span class="txtreq">*</span>
                &nbsp;<span class="error">@error('password'){{ $message }}@enderror</span><br><br>

                <label>Confirm Password: </label>
                <input type="password" name="password_confirmation"><br><br>

                <input type="submit" value="Register">
            </form>
        </div>
</body>
</html>