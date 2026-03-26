<?php

namespace App\Imports;

use App\Models\Mst_agent;
use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class AgentImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $agent_code = $row[0];
            $agent_name = $row[1];
            $photo_filename = $row[2];
            $active = $row[3];

            if ($agent_code!=''){
                $qAgents = Mst_agent::where([
                    'agent_code'=>$agent_code,
                ])
                ->first();
                if (!$qAgents){
                    $insAgent = Mst_agent::create([
                        'agent_code'=>$agent_code,
                        'name'=>$agent_name,
                        'photo'=>$photo_filename,
                        'active'=>$active,
                        'created_by'=>1,
                        'updated_by'=>1,
                    ]);
                }else{
                    $updAgent = Mst_agent::where('agent_code', '=', $agent_code)
                    ->update([
                        'agent_code'=>$agent_code,
                        'name'=>$agent_name,
                        'photo'=>$photo_filename,
                        'active'=>$active,
                        'updated_by'=>1,
                    ]);
                }
            }
        }
    }
}
