<?php

namespace App\Http\Controllers\dbg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class MergeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imgAgentW = $_SERVER['DOCUMENT_ROOT'].'/assets/images/dbg/00001205-280w.png';
        $imgAgentM = $_SERVER['DOCUMENT_ROOT'].'/assets/images/dbg/00001205-280m.png';
        $imgBg1w = $_SERVER['DOCUMENT_ROOT'].'/assets/images/dbg/bg_popup_w2024_atas.png';
        $imgBg2w = $_SERVER['DOCUMENT_ROOT'].'/assets/images/dbg/bg_popup_w2024_atas_belakang.png';
        $imgBg1m = $_SERVER['DOCUMENT_ROOT'].'/assets/images/dbg/bg_popup_m2024_atas.png';
        $imgBg2m = $_SERVER['DOCUMENT_ROOT'].'/assets/images/dbg/bg_popup_m2024_atas_belakang.png';

        // create a canvas image from a file - driver GD
        $managerW = ImageManager::gd();
        $imageW = $managerW->read($imgBg1w);

        // paste another image
        $imageW->place($imgBg2w);

        // paste another image
        $imageW->place(
            $imgAgentW,
            'center-center',    // left-bottom, top-right, center-center, etc
            -5,
            33,
            100);

        // save modified image in new format - as PNG
        $imageW->toPng()->save($_SERVER['DOCUMENT_ROOT'].'/assets/images/dbg/00001205-280wBg.png');

        // create a canvas image from a file - driver GD
        $managerM = ImageManager::gd();
        $imageM = $managerM->read($imgBg1m);

        // paste another image
        $imageM->place(
            $imgBg2m,
            'center-center',    // left-bottom, top-right, center-center, etc
            2,
            5,
            100);

        // paste another image
        $imageM->place(
            $imgAgentM,
            'center-center',    // left-bottom, top-right, center-center, etc
            -5,
            27,
            100);

        // save modified image in new format - as PNG
        $imageM->toPng()->save($_SERVER['DOCUMENT_ROOT'].'/assets/images/dbg/00001205-280mBg.png');

        echo '<img src="'.url('/assets/images/dbg/00001205-280wBg.png').'"><br/><br/><br/>';
        echo '<img src="'.url('/assets/images/dbg/00001205-280mBg.png').'">';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
