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
                <td>{{ 'Rp ' . number_format($item->satuan, 0, ',', '.') }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->date }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5">Jumlah</th>
            <th colspan="1">{{ 'Rp ' . number_format($jml_anggaran, 0, ',', '.') }}</th>
            <th></th>
        </tr>
    </tfoot>
</table>
