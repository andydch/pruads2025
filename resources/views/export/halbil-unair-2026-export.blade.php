<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>alumni</title>

        <style>
            table>thead>tr>td
            {
                font-weight: bold;
                background-color: #f0f0f0;
            }
        </style>
    </head>
    <body>
        <div class="table-responsive">
            <table style="width:1024px;">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>No HP</td>
                        <td>Tanggal/Jam Konfirmasi</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $qAlumni = \App\Models\HalbilUnairModel::select(
                            'id',
                            'nama',
                            'no_hp',
                        )
                        ->addSelect([
                            'confirmDate' => \App\Models\HalbilUnairConfirmModel::select('created_at')
                            ->whereColumn('alumni_id', 'halbil_unair_models.id')
                            ->orderBy('created_at', 'ASC')
                            ->take(1)
                        ])
                        ->where('active', 'Y')
                        ->orderBy('nama', 'ASC')
                        ->get();
                    @endphp
                    @foreach ($qAlumni as $qA)
                        <tr>
                            <td>{{ $qA->nama }}</td>
                            <td>'{{ $qA->no_hp }}</td>
                            @php
                                $date = new DateTime($qA->confirmDate);
                            @endphp 
                            <td>{{ $qA->confirmDate!=null?$date->format('d F Y - h:i:s A'):'' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    </body>
</html>
