@if (empty(session('user.email')))
    {{ route('login') }}
    {{ exit() }}
@endif
<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin-left: auto;
            margin-right: auto;

        }

        body {
            margin-left: auto;
            margin-right: auto;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <div style="text-align:center; margin-bottom:10px">
            <h2>Students Records</h2>
            <button style="background-color: blue; height:35px; border-radius:12px"><a href="/student/registration"
                style="text-decoration: none; color:white">Add New Student</a></button>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Actions</th>
        </tr>
        @foreach($students as $student )
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->gender }}</td>
            <td><button style="background-color: red; margin-right:30px;"><a href="/student/getData/{{$student->email}}"
                        style="text-decoration: none; color:white;">update</a></button>
                <button style="background-color: green"><a href="/student/delete/{{$student->id}}"
                        style="text-decoration: none; color:white">delete</a></button>
            </td>
        </tr>


        @endforeach

    </table>

</body>

</html>
