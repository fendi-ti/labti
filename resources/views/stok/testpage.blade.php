<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th scope="col" width="4%">No.</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col" width="30%">Spesifikasi Teknis</th>
                <th scope="col">Volume</th>
                <th scope="col">Satuan</th>
                <th scope="col">Tanggal Perolehan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habis_pakai as $s)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $s->jenis_barang }}</td>
                <td>{{ $s->spesifikasi }}</td>
                <td class="text-center">{{ $s->stok }}</td>
                <td>{{ $s->satuan }}</td>
                <td>{{ $s->tanggal_masuk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{dd($habis_pakai->links())}}
    <!--<style>
        .w-5 {
            display: none;
        }
    </style>-->
</body>

</html>