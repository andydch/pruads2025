<?php

use App\Models\Mst_agent_achievement;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

new class extends Component
{
    use WithPagination;

    #[Url(history: true, keep: true, except: '')]
    public $search = '';

    public function cari(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function searchAgent(){
        $this->resetPage();
    }

    public function render()
    {
        $agentAOY = Mst_agent_achievement::leftJoin('mst_agents as ag', 'mst_agent_achievements.agent_id', '=', 'ag.id')
        ->leftJoin('mst_achievements as ma', 'mst_agent_achievements.achievement_id', '=', 'ma.id')
        ->select(
            'ag.id as agent_id',
            'ag.agent_code as agent_code',
            'ag.slug as agent_slug',
            'ag.photo as photo',
            'ag.name as agent_name',
            'ma.name as achievement_name',
        )
        ->where('ma.id', 8)
        ->where('mst_agent_achievements.active', 'Y')
        ->where('ag.active', 'Y')
        ->where('ma.active', 'Y')
        ->orderBy('ag.name', 'ASC')
        ->orderBy('ma.order_no', 'ASC')
        ->first();

        $agents = Mst_agent_achievement::leftJoin('mst_agents as ag', 'mst_agent_achievements.agent_id', '=', 'ag.id')
        ->leftJoin('mst_achievements as ma', 'mst_agent_achievements.achievement_id', '=', 'ma.id')
        ->select(
            'ag.id as agent_id',
            'ag.agent_code as agent_code',
            'ag.slug as agent_slug',
            'ag.photo as photo',
            'ag.name as agent_name',
            'ma.name as achievement_name',
        )
        ->whereIn('ma.id', [46,47,170,171,50,51,52,53,54,55,56,39,57,58,59,60,61,62,63,172,173,37,64,65,66,67,68,69,70,31,40,3,18,30,180,181])
        ->when($this->search!='', function($q){
            $q->where('ag.name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('ag.agent_code', 'LIKE', '%'.$this->search.'%');
        })
        ->where('mst_agent_achievements.active', 'Y')
        ->where('ag.active', 'Y')
        ->where('ma.active', 'Y')
        ->orderBy('ma.order_no', 'ASC')
        ->orderBy('ag.name', 'ASC')
        ->paginate(18);

        $agents->appends([
            'search' => $this->search,
        ]);

        return $this->view([
            // Get all posts with latest pagination
            'agentAOY' => $agentAOY,
            'agents' => $agents,
        ])
        ->layout('layouts::app-main')
        ->title('TOP AGENCY RECOGNITION');
    }
};
?>

<section class="team-section__area team-section team-section-2 overflow-hidden section-space bg_agen">
    <div class="team-section">
        <div class="container transparan">
            <x-search-agent />

            <x-menu />
            
            <div align="center" class="mb-30">
                <img src="assets/imgs/img_text_top_agent_recognition.png" class="tulisan_tac" alt=""/> 
            </div>

            <div class="team-section__wrapper pl-5 pr-5">
                <div class="row m-auto">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-6 m-auto">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb" >
                                <img src="{{ Storage::disk('public')->exists('agents/'.$agentAOY->photo)?asset('storage/agents/'.$agentAOY->photo):asset('assets/images/blank.png') }}"
                                    alt="{{ $agentAOY->photo }}" width="100">
                            </div>
                            @php
                                $photo = Storage::disk('public')->exists('agents/'.$agentAOY->photo)?asset('storage/agents/'.$agentAOY->photo):asset('assets/images/blank.png');
                                $ach = '';
                                $br = '';
                                $achCounter = 0;
                                $achievements = \App\Models\Mst_agent_achievement::leftJoin('mst_achievements AS ma', 'mst_agent_achievements.achievement_id', '=', 'ma.id')
                                ->select(
                                    'ma.id AS achievement_id',
                                    'ma.name AS achievement_name',
                                )
                                ->where('mst_agent_achievements.agent_id', '=', $agentAOY->agent_id)
                                ->where('mst_agent_achievements.active', '=', 'Y')
                                ->where('ma.active', '=', 'Y')
                                ->orderBy('ma.order_no', 'ASC')
                                ->get();
                            @endphp
                            @foreach ($achievements as $achievement)
                                @php
                                    $ach .= ucwords(strtolower($achievement->achievement_name)).'<br/>';
                                    $achCounter++;
                                @endphp
                            @endforeach
                            @php
                                $ach = str_replace("'","\'",$ach);
                            @endphp
                            @for($i=0;$i<5-$achCounter;$i++)
                                @php
                                    $br .= '&nbsp;<br/>';
                                @endphp
                            @endfor
                            <a onclick="displayModal('{{ $agentAOY->agent_name }}', '{{ $ach.$br }}', '{{ $agentAOY->agent_slug }}', '{{ $photo }}')" style="cursor: pointer;">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">{{ $agentAOY->agent_name }}</h3>
                                    <p class="team-section__position">{{ ucwords(strtolower($agentAOY->achievement_name)) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row m-auto">
                    @forelse ($agents as $agent)
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12 m-auto">
                            <div class="team-section__item mb-30">
                                <div class="team-section__thumb">
                                    <img src="{{ Storage::disk('public')->exists('agents/'.$agent->photo)?asset('storage/agents/'.$agent->photo):asset('assets/images/blank.png') }}"
                                        alt="{{ $agent->photo }}" width="100">
                                </div>
                                @php
                                    $photo = Storage::disk('public')->exists('agents/'.$agent->photo)?asset('storage/agents/'.$agent->photo):asset('assets/images/blank.png');
                                    $ach = '';
                                    $br = '';
                                    $achCounter = 0;
                                    $achievements = \App\Models\Mst_agent_achievement::leftJoin('mst_achievements AS ma', 'mst_agent_achievements.achievement_id', '=', 'ma.id')
                                    ->select(
                                        'ma.id AS achievement_id',
                                        'ma.name AS achievement_name',
                                    )
                                    ->where('mst_agent_achievements.agent_id', '=', $agent->agent_id)
                                    ->where('mst_agent_achievements.active', '=', 'Y')
                                    ->where('ma.active', '=', 'Y')
                                    ->orderBy('ma.order_no', 'ASC')
                                    ->get();
                                @endphp
                                @foreach ($achievements as $achievement)
                                    @php
                                        $ach .= ucwords(strtolower($achievement->achievement_name)).'<br/>';
                                        $achCounter++;
                                    @endphp
                                @endforeach
                                @php
                                    $ach = str_replace("'","\'",$ach);
                                @endphp
                                @for($i=0;$i<5-$achCounter;$i++)
                                    @php
                                        $br .= '&nbsp;<br/>';
                                    @endphp
                                @endfor
                                <a onclick="displayModal('{{ $agent->agent_name }}', '{{ $ach.$br }}', '{{ $agent->agent_slug }}', '{{ $photo }}')" style="cursor: pointer;">
                                    <div class="team-section__content">
                                        <h3 class="team-section__title">{{ $agent->agent_name }}</h3>
                                        <p class="team-section__position">{{ ucwords(strtolower($agent->achievement_name)) }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                </div>

                <div class="row m-auto">
                    {{ $agents->links('vendor.pagination.bootstrap-5') }}
                </div>
            
            </div>
        </div>
    </div>
</section>

{{-- <div>
</div> --}}