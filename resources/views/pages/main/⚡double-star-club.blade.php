<?php

use App\Models\Mst_agent;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

new class extends Component
{
    use WithPagination;

    #[Url(history: true, keep: true, except: '')]
    public $search = '';
    #[Url(history: true, keep: true, except: '')]
    public $q = '';

    public function cari(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingQ(){
        $this->resetPage();
    }

    public function searchAgent(){
        $this->resetPage();
    }

    public function render()
    {
        $agents = Mst_agent::select(
            'id as agent_id',
            'name as agent_name',
            'slug as agent_slug',
            'photo',
        )
        ->whereIn('id', function($query){
            $query->select('agent_id')
            ->from('mst_agent_categories')
            ->when($this->q=='l', function($query1) {
                $query1->where('category_id', 1);
            })
            ->when($this->q=='p', function($query1) {
                $query1->where('category_id', 2);
            })
            ->when($this->q!='l' && $this->q!='p', function($query1) {
                $query1->whereIn('category_id', [1, 2]);
            })
            ->where('active', 'Y');
        })
        ->when($this->search!='', function($query){
            $query->where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('agent_code', 'LIKE', '%'.$this->search.'%');
        })
        ->where('active', 'Y')
        ->orderBy('name', 'ASC')
        ->paginate(18);

        $agents->appends([
            'search' => $this->search,
            'q' => $this->q,
        ]);

        return $this->view([
            // Get all posts with latest pagination
            'agents' => $agents,
        ])
        ->layout('layouts::app-main')
        ->title('DOUBLE STAR CLUB');
    }
};
?>

<section class="team-section__area team-section team-section-2 overflow-hidden section-space bg_agen">
    <div class="team-section">
        <div class="container transparan">
            <x-search-agent />

            <x-menu />
            
            <div align="center" class="mb-30">
                <img src="assets/imgs/b_dsc.png" class="tulisan_tac" alt=""/> 
            </div>

            {{-- <div class="d-flex justify-content-center align-items-center mb-30">
                <div class="dropdown">
                    <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                        <span>Please Select</span>&nbsp;&nbsp;
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('double-star-club').'?q=l' }}">Leader </a></li>
                        <li><a class="dropdown-item" href="{{ route('double-star-club').'?q=p' }}">Producer </a></li>
                    </ul>
                </div> 
            </div> --}}

            <div class="d-flex justify-content-center align-items-center mb-30">
                <div class="flat-select-container">
                    <select id="top-regional-area" class="flat-select" name="kategori_pilihan" onchange="goSubCategory('{{ route('double-star-club').'?q=' }}'+this.value);">
                        <option value="" disabled selected>Please Select</option>
                        <option {{ $q=='l'?'selected':'' }} value="l">{{ ucwords(strtolower('LEADER')) }}</option>
                        <option {{ $q=='p'?'selected':'' }} value="p">{{ ucwords(strtolower('PRODUCER')) }}</option>
                    </select>
                </div>
            </div>

            <div class="team-section__wrapper pl-5 pr-5 pb-15">
                <div class="row m-auto">
                    @forelse ($agents as $agent)
                        <div class="{{ ENV("GRID_AGENTS") }}" style="justify-content: center;display: grid;">
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
                                        $ach .= $achievement->achievement_name.'<br/>';
                                        // $ach .= ucwords(strtolower($achievement->achievement_name)).'<br/>';
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
                                        <p class="team-section__position">{{ $agent->achievement_name }}</p>
                                        {{-- <p class="team-section__position">{{ ucwords(strtolower($agent->achievement_name)) }}</p> --}}
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