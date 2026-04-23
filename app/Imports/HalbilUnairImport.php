<?php

namespace App\Imports;

use App\Models\HalbilUnairModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class HalbilUnairImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $nama = $row[1];
            $fakultas = $row[2];
            $angkatan = $row[3];
            $instansi = $row[4];
            $no_hp = $row[5];
            if ($nama!='Nama'){
                $qAlumni = HalbilUnairModel::where('no_hp', $no_hp)
                ->first();
                if (!$qAlumni){
                    $insAlumni = HalbilUnairModel::create([
                        'nama' => $nama,
                        'fakultas' => $fakultas,
                        'angkatan' => $angkatan,
                        'instansi' => $instansi,
                        'no_hp' => $no_hp,
                    ]);
                }
            }
        }
    }
}
