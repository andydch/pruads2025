<?php

namespace App\Http\Controllers\oth;

use App\Http\Controllers\Controller;
use App\Imports\HalbilUnairImport;
use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Http\Request;

class AlumniUnairImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $realpath = $_SERVER['DOCUMENT_ROOT'].'/storage/xls/data-alumni-unair.xlsx';
        Excel::import(new HalbilUnairImport, $realpath);
        dd('Data berhasil diunggah.');
    }
}
