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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <table border="2">
        <thead>
            <tr>
                <th colspan="4" style="text-align: center">Daftar Hadir Yudisium</th>
            </tr>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td> {{ $item->nim_user }} </td>
                    <td> {{ $item->name }} </td>
                    <td> {{ $item->prodi }} </td>
                    <td> {{ $item->created_at }} </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</body>

</html>
