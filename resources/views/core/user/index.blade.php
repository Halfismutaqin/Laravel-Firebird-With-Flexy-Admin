<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
</head>
<body>
    <h1>Daftar Users</h1>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>USER ID</th>
                <th>MANAGE USER</th>
                <th>MANAGE ITEMS</th>
                <th>MANAGE ITEMS REPORT</th>
                <th>MANAGE ITEMS IMPORT</th>
                <th>MANAGE LOCATION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <td>{{ $user->USER_ID }}</td>
                    <td>{{ $user->MNG_USR }}</td>
                    <td>{{ $user->MNG_ITEMS }}</td>
                    <td>{{ $user->MNG_ITEMS_RPT }}</td>
                    <td>{{ $user->MNG_ITEMS_IMPORT }}</td>
                    <td>{{ $user->MNG_LOCN }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
