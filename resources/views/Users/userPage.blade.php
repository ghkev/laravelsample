<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        table, th, td{  
            border: 1px solid;
            border-collapse: collapse;
        }
        table{
            width: 50%;
        }
        th, td{
            padding: 10px;
            font-family: sans-serif;
            text-align: center;
        }
        .aEdit{
            color: blue;
            font-weight: bold;
        }
        .aDelete{
            color: red;
            font-weight: bold;
        }
        .success{
            color: green;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <a href="{{ url('dashboard') }}"><button type="button">< Back</button></a><br>
    <h2>Users</h2>
        @if (Session::has('success'))
            <span class="success">{{ Session::get('success') }}</span><br><br>
        @endif
        @if (Session::has('fail'))
            <span class="error">{{ Session::get('fail') }}</span><br><br>
        @endif
        <div>
            <table>
                <theader>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Action</th>
                </theader>
                <tbody>
                    @foreach($tbldata as $tbd)
                    <tr>
                        <td>{{ $tbd->id }}</td>
                        <td>{{ $tbd->name }}</td>
                        <td>{{ $tbd->email }}</td>
                        <td>{{ $tbd->username }}</td>
                        <td><a href="{{ url('edit-user'.$tbd->id) }}" class="aEdit">Edit</a>
                        &nbsp;<a href="{{ url('delete-user'.$tbd->id) }}" onclick=" return confirm('Are you sure you want to delete {{ $tbd->name }} ?')" class="aDelete">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>
</html>