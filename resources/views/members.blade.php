
<!DOCTYPE html>
<html>
<head>
    <title>Registered Members</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
{{--<h2>Registered Members</h2>--}}

@if(count($users) > 0)
    <table  class="table table-success table-striped">
        <tr>
            <th>Photo</th>
            <th>Full Name</th>
            <th>Report subject</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td><img src="{{ asset('uploads/' . $user->file_name) }}" width="100" height="100"></td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->report }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>No data</p>
@endif
</body>
</html>


