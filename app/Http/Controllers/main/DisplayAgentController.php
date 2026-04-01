<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mst_agent;
use App\Models\Mst_agent_achievement;

class DisplayAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $agent = Mst_agent::where('slug', $slug)
        ->where('active', 'Y')
        ->first();
        if ($agent){
            $ach = Mst_agent_achievement::leftJoin('mst_achievements as ma', 'mst_agent_achievements.achievement_id', '=', 'ma.id')
            ->select(
                'ma.name as achievement_name',
            )
            ->where('mst_agent_achievements.agent_id', $agent->id)
            ->where('mst_agent_achievements.active', 'Y')
            ->where('ma.active', 'Y')
            ->orderBy('ma.order_no', 'ASC')
            ->get();

            $data = [
                'agent' => $agent,
                'ach' => $ach,
            ];
            return view('main.display-agent', $data);
        }else{
            // 
        }
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
