<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .text {
            font-size: 14pt;
            font-weight: 500
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th colspan="2">User Information</th>
        </tr>
        <tr>
            <td>Username:</td>
            <td>{{ $user->username }}</td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <td>
                {!! DNS1D::getBarcodeHTML($user->nim, 'C128', 1.2, 25) !!}
            </td>
        </tr>
    </table>

</body>

</html>
