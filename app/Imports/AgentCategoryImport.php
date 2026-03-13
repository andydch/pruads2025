<?php

namespace App\Imports;

use App\Models\Mst_agent;
use App\Models\Mst_agent_category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class AgentCategoryImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $agent_code = $row[0];
            $category_id = $row[1];
            $active = $row[2];

            if ($agent_code!=''){
                $qAgents = Mst_agent::where([
                    'agent_code'=>$agent_code,
                ])
                ->first();
                if ($qAgents){
                    $qAgentCategory = Mst_agent_category::where('agent_id', '=', $qAgents->id)
                    ->where('category_id', '=', $category_id)
                    ->first();
                    if ($qAgentCategory){
                        $updAgentCategory = Mst_agent_category::where('agent_id', '=', $qAgents->id)
                        ->where('category_id', '=', $category_id)
                        ->update([
                            'agent_id'=>$qAgents->id,
                            'category_id'=>$category_id,
                            'active'=>$active,
                            'updated_by'=>1,
                        ]);
                    }else{
                        $insAgentCategory = Mst_agent_category::create([
                            'agent_id'=>$qAgents->id,
                            'category_id'=>$category_id,
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
