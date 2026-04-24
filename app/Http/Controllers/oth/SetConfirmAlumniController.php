<?php

namespace App\Http\Controllers\oth;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\HalbilUnairModel;
use App\Models\HalbilUnairConfirmModel;

class SetConfirmAlumniController extends Controller
{
    public function show($id)
    {
        $insConfirm = HalbilUnairConfirmModel::create([
            'alumni_id' => $id,
        ]);

        $qAlumni = HalbilUnairModel::findOrFail($id);
        // dd($qAlumni->no_hp);
        $no_hp = str_replace('‘', '', $qAlumni->no_hp);
        $no_hp = str_replace(' ', '', $no_hp);
        $no_hp = str_replace('-', '', $no_hp);
        // dd('/oth/daftar-halbil-unair?search='.$no_hp.'&q=');

        return redirect('/oth/daftar-halbil-unair?search='.$no_hp.'&q=');
    }
}
