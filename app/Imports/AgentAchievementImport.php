<?php

namespace App\Imports;

use App\Models\Mst_agent;
use App\Models\Mst_agent_achievement;
use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class AgentAchievementImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $agent_code = $row[0];
            $achievement_id = $row[1];
            $active = $row[2];

            if ($agent_code!=''){
                $qAgents = Mst_agent::where([
                    'agent_code'=>$agent_code,
                ])
                ->first();
                if ($qAgents){
                    $qAgentAchievement = Mst_agent_achievement::where('agent_id', '=', $qAgents->id)
                    ->where('achievement_id', '=', $achievement_id)
                    ->first();
                    if ($qAgentAchievement){
                        $updAgentCategory = Mst_agent_achievement::where('agent_id', '=', $qAgents->id)
                        ->where('achievement_id', '=', $achievement_id)
                        ->update([
                            'agent_id'=>$qAgents->id,
                            'achievement_id'=>$achievement_id,
                            'active'=>$active,
                            'updated_by'=>1,
                        ]);
                    }else{
                        $insAgentCategory = Mst_agent_achievement::create([
                            'agent_id'=>$qAgents->id,
                            'achievement_id'=>$achievement_id,
                            'active'=>$active,
                            'created_by'=>1,
                            'updated_by'=>1,
                        ]);
                    }
                }
            }
        }
    }
}
