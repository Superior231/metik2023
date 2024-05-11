<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anggaran METIK 2023</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #257cc4;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <table style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Type</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggaran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ "Rp " . number_format($item->satuan,0,',','.') }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ "Rp " . number_format($item->harga,0,',','.') }}</td>
                    <td>{{ $item->date }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Jumlah</th>
                <th colspan="1">{{ "Rp " . number_format($jml_anggaran,0,',','.') }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    
</body>
</html>


