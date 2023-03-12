<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <style>
        .error{
            color: red;
        }
        .success{
            color: green;
        }
    </style>
</head>
<body>
    <a href="{{ url('users') }}"><input type="button" value="< Back"></a>
        <div>
            <h2>Update Account</h2>
                @if (Session::has('success'))
                    <span class="success">{{ Session::get('success')}}</span><br><br>
                @endif
                @if (Session::has('fail'))
                    <span class="error">{{ Session::get('fail') }}</span><br><br>
                @endif
            <form action="update{{ $cu[0]->id }}" method="post">
                @csrf
                <label>Name: </label>
                <input type="text" name="name" value="{{ $cu[0]->name }}">
                &nbsp;<span class="error">@error('name')* {{ $message }}@enderror</span><br><br>

                <label>Email: </label>
                <input type="text" name="email" value="{{ $cu[0]->email }}">
                &nbsp;<span class="error">@error('email')* {{ $message }}@enderror</span><br><br>

                <label>Username: </label>
                <input type="text" name="username" value="{{ $cu[0]->username }}">
                &nbsp;<span class="error">@error('username')* {{ $message }}@enderror</span><br><br>

                <label>Password: </label>
                <input type="password" name="password" value="{{ $cu[0]->password }}">
                &nbsp;<span class="error">@error('password')* {{ $message }}@enderror</span><br><br>

                <label>Confirm Password: </label>
                <input type="password" name="password_confirmation"><br><br>

                <input type="submit" value="Update">
            </form>
        </div>
</body>
</html>