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
        ->when($this->search=='', function($query){
            $query->whereIn('id', function($query1){
                $query1->select('agent_id')
                ->from('mst_agent_achievements')
                ->when($this->q=='reg01', function($query1a) {
                    $query1a->whereIn('achievement_id', [135, 131, 130, 126]);
                })
                ->when($this->q=='reg02', function($query1a) {
                    $query1a->whereIn('achievement_id', [134, 133, 124, 107, 98, 73]);
                })
                ->when($this->q=='reg03', function($query1a) {
                    $query1a->whereIn('achievement_id', [175, 158, 157, 128, 112, 88, 74]);
                })
                ->when($this->q=='reg04', function($query1a) {
                    $query1a->whereIn('achievement_id', [176, 162, 156, 151, 108, 99, 84]);
                })
                ->when($this->q=='reg05', function($query1a) {
                    $query1a->whereIn('achievement_id', [177, 174, 152, 123, 95, 77]);
                })
                ->when($this->q=='reg06', function($query1a) {
                    $query1a->whereIn('achievement_id', [160, 148, 142, 120, 113, 103, 93, 76]);
                })
                ->when($this->q=='reg07', function($query1a) {
                    $query1a->whereIn('achievement_id', [147, 141, 129, 115, 97, 85]);
                })
                ->when($this->q=='reg08', function($query1a) {
                    $query1a->whereIn('achievement_id', [159, 149, 139, 114, 92, 81]);
                })
                ->when($this->q=='reg09', function($query1a) {
                    $query1a->whereIn('achievement_id', [138, 137, 122, 118, 101, 79]);
                })
                ->when($this->q=='reg10', function($query1a) {
                    $query1a->whereIn('achievement_id', [155, 154, 127, 110, 100, 80]);
                })
                ->when($this->q=='reg11', function($query1a) {
                    $query1a->whereIn('achievement_id', [178, 145, 144, 140, 116, 91, 75]);
                })
                ->when($this->q=='reg12', function($query1a) {
                    $query1a->whereIn('achievement_id', [165, 164, 132, 121, 106, 105, 90, 83]);
                })
                ->when($this->q=='reg13', function($query1a) {
                    $query1a->whereIn('achievement_id', [179, 163, 150, 125, 109, 89, 86]);
                })
                ->when($this->q=='reg14', function($query1a) {
                    $query1a->whereIn('achievement_id', [161, 153, 146, 111, 96, 78]);
                })
                ->when($this->q=='reg15', function($query1a) {
                    $query1a->whereIn('achievement_id', [169, 167, 166, 117, 102, 87]);
                })
                ->when($this->q!='reg01' && 
                    $this->q!='reg02' &&
                    $this->q!='reg03' &&
                    $this->q!='reg04' &&
                    $this->q!='reg05' &&
                    $this->q!='reg06' &&
                    $this->q!='reg07' &&
                    $this->q!='reg08' &&
                    $this->q!='reg09' &&
                    $this->q!='reg10' &&
                    $this->q!='reg11' &&
                    $this->q!='reg12' &&
                    $this->q!='reg13' &&
                    $this->q!='reg14' &&
                    $this->q!='reg15', 
                    function($query1a) {
                    $query1a->whereIn('achievement_id', [
                        135, 131, 130, 126, 134, 133, 124, 107, 98, 73, 
                        175, 158, 157, 128, 112, 88, 74, 176, 162, 156, 151, 108, 99, 84, 
                        177, 174, 152, 123, 95, 77, 160, 148, 142, 120, 113, 103, 93, 76, 
                        147, 141, 129, 115, 97, 85, 159, 149, 139, 114, 92, 81, 
                        138, 137, 122, 118, 101, 79, 155, 154, 127, 110, 100, 80, 
                        178, 145, 144, 140, 116, 91, 75, 165, 164, 132, 121, 106, 105, 90, 83, 
                        179, 163, 150, 125, 109, 89, 86, 161, 153, 146, 111, 96, 78, 
                        169, 167, 166, 117, 102, 87
                    ]);
                })
                ->where('active', 'Y');
            });
        })
        // ->whereIn('id', function($query){
        //     $query->select('agent_id')
        //     ->from('mst_agent_achievements')
        //     ->when($this->q=='reg01', function($query1) {
        //         $query1->whereIn('achievement_id', [135, 131, 130, 126]);
        //     })
        //     ->when($this->q=='reg02', function($query1) {
        //         $query1->whereIn('achievement_id', [134, 133, 124, 107, 98, 73]);
        //     })
        //     ->when($this->q=='reg03', function($query1) {
        //         $query1->whereIn('achievement_id', [175, 158, 157, 128, 112, 88, 74]);
        //     })
        //     ->when($this->q=='reg04', function($query1) {
        //         $query1->whereIn('achievement_id', [176, 162, 156, 151, 108, 99, 84]);
        //     })
        //     ->when($this->q=='reg05', function($query1) {
        //         $query1->whereIn('achievement_id', [177, 174, 152, 123, 95, 77]);
        //     })
        //     ->when($this->q=='reg06', function($query1) {
        //         $query1->whereIn('achievement_id', [160, 148, 142, 120, 113, 103, 93, 76]);
        //     })
        //     ->when($this->q=='reg07', function($query1) {
        //         $query1->whereIn('achievement_id', [147, 141, 129, 115, 97, 85]);
        //     })
        //     ->when($this->q=='reg08', function($query1) {
        //         $query1->whereIn('achievement_id', [159, 149, 139, 114, 92, 81]);
        //     })
        //     ->when($this->q=='reg09', function($query1) {
        //         $query1->whereIn('achievement_id', [138, 137, 122, 118, 101, 79]);
        //     })
        //     ->when($this->q=='reg10', function($query1) {
        //         $query1->whereIn('achievement_id', [155, 154, 127, 110, 100, 80]);
        //     })
        //     ->when($this->q=='reg11', function($query1) {
        //         $query1->whereIn('achievement_id', [178, 145, 144, 140, 116, 91, 75]);
        //     })
        //     ->when($this->q=='reg12', function($query1) {
        //         $query1->whereIn('achievement_id', [165, 164, 132, 121, 106, 105, 90, 83]);
        //     })
        //     ->when($this->q=='reg13', function($query1) {
        //         $query1->whereIn('achievement_id', [179, 163, 150, 125, 109, 89, 86]);
        //     })
        //     ->when($this->q=='reg14', function($query1) {
        //         $query1->whereIn('achievement_id', [161, 153, 146, 111, 96, 78]);
        //     })
        //     ->when($this->q=='reg15', function($query1) {
        //         $query1->whereIn('achievement_id', [169, 167, 166, 117, 102, 87]);
        //     })
        //     ->when($this->q!='reg01' && 
        //         $this->q!='reg02' &&
        //         $this->q!='reg03' &&
        //         $this->q!='reg04' &&
        //         $this->q!='reg05' &&
        //         $this->q!='reg06' &&
        //         $this->q!='reg07' &&
        //         $this->q!='reg08' &&
        //         $this->q!='reg09' &&
        //         $this->q!='reg10' &&
        //         $this->q!='reg11' &&
        //         $this->q!='reg12' &&
        //         $this->q!='reg13' &&
        //         $this->q!='reg14' &&
        //         $this->q!='reg15', 
        //         function($query1) {
        //         $query1->whereIn('achievement_id', [
        //             135, 131, 130, 126, 134, 133, 124, 107, 98, 73, 
        //             175, 158, 157, 128, 112, 88, 74, 176, 162, 156, 151, 108, 99, 84, 
        //             177, 174, 152, 123, 95, 77, 160, 148, 142, 120, 113, 103, 93, 76, 
        //             147, 141, 129, 115, 97, 85, 159, 149, 139, 114, 92, 81, 
        //             138, 137, 122, 118, 101, 79, 155, 154, 127, 110, 100, 80, 
        //             178, 145, 144, 140, 116, 91, 75, 165, 164, 132, 121, 106, 105, 90, 83, 
        //             179, 163, 150, 125, 109, 89, 86, 161, 153, 146, 111, 96, 78, 
        //             169, 167, 166, 117, 102, 87
        //         ]);
        //     })
        //     ->where('active', 'Y');
        // })
        ->when($this->search!='', function($query){
            $query->where(function($query1) {
                $query1->where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('agent_code', 'LIKE', '%'.$this->search.'%');
            });
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
        ->title('TOP REGION');
    }
};
?>

<section class="team-section__area team-section team-section-2 overflow-hidden section-space bg_agen">
    <div class="team-section">
        <div class="container transparan">
            <x-search-agent />

            <x-menu />
            
            <div align="center" class="mb-30">
                <img src="assets/imgs/b_tr.png" class="tulisan_tac" alt=""/> 
            </div>

            {{-- <div class="d-flex justify-content-center align-items-center mb-30">
                <div class="dropdown">
                    <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                        <span>Please Select</span>&nbsp;&nbsp;
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg05' }}">{{ ucwords(strtolower('JAKARTA 1')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg06' }}">{{ ucwords(strtolower('JAKARTA 2')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg07' }}">{{ ucwords(strtolower('JAKARTA 3')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg08' }}">{{ ucwords(strtolower('JAKARTA 4')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg09' }}">{{ ucwords(strtolower('JAKARTA 5')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg10' }}">{{ ucwords(strtolower('JAKARTA 6')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg11' }}">{{ ucwords(strtolower('JAKARTA 7')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg15' }}">{{ ucwords(strtolower('JAKARTA SYARIAH')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg14' }}">{{ ucwords(strtolower('WEST JAVA')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg02' }}">{{ ucwords(strtolower('CENTRAL JAVA & KALIMANTAN')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg03' }}">{{ ucwords(strtolower('EAST JAVA 1')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg04' }}">{{ ucwords(strtolower('EAST JAVA 2')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg12' }}">{{ ucwords(strtolower('SUMATERA 1')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg13' }}">{{ ucwords(strtolower('SUMATERA 2')) }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('top-regional').'?q=reg01' }}">{{ ucwords(strtolower('BALI EAST ISLANDS')) }} </a></li>
                    </ul>
                </div> 
            </div> --}}

            <div class="d-flex justify-content-center align-items-center mb-30">
                <div class="flat-select-container">
                    <select id="top-regional-area" class="flat-select" name="kategori_pilihan" onchange="goRegionalArea(this.value);">
                        <option value="" disabled selected>Please Select Area</option>
                        <option {{ $q=='reg05'?'selected':'' }} value="5">{{ ucwords(strtolower('JAKARTA 1')) }}</option>
                        <option {{ $q=='reg06'?'selected':'' }} value="6">{{ ucwords(strtolower('JAKARTA 2')) }}</option>
                        <option {{ $q=='reg07'?'selected':'' }} value="7">{{ ucwords(strtolower('JAKARTA 3')) }}</option>
                        <option {{ $q=='reg08'?'selected':'' }} value="8">{{ ucwords(strtolower('JAKARTA 4')) }}</option>
                        <option {{ $q=='reg09'?'selected':'' }} value="9">{{ ucwords(strtolower('JAKARTA 5')) }}</option>
                        <option {{ $q=='reg10'?'selected':'' }} value="10">{{ ucwords(strtolower('JAKARTA 6')) }}</option>
                        <option {{ $q=='reg11'?'selected':'' }} value="11">{{ ucwords(strtolower('JAKARTA 7')) }}</option>
                        <option {{ $q=='reg15'?'selected':'' }} value="15">{{ ucwords(strtolower('JAKARTA SYARIAH')) }}</option>
                        <option {{ $q=='reg14'?'selected':'' }} value="14">{{ ucwords(strtolower('WEST JAVA')) }}</option>
                        <option {{ $q=='reg02'?'selected':'' }} value="2">{{ ucwords(strtolower('CENTRAL JAVA & KALIMANTAN')) }}</option>
                        <option {{ $q=='reg03'?'selected':'' }} value="3">{{ ucwords(strtolower('EAST JAVA 1')) }}</option>
                        <option {{ $q=='reg04'?'selected':'' }} value="4">{{ ucwords(strtolower('EAST JAVA 2')) }}</option>
                        <option {{ $q=='reg12'?'selected':'' }} value="12">{{ ucwords(strtolower('SUMATERA 1')) }}</option>
                        <option {{ $q=='reg13'?'selected':'' }} value="13">{{ ucwords(strtolower('SUMATERA 2')) }}</option>
                        <option {{ $q=='reg01'?'selected':'' }} value="1">{{ ucwords(strtolower('BALI EAST ISLANDS')) }}</option>
                    </select>
                </div>
            </div>

            <div class="team-section__wrapper pl-5 pr-5 pb-5">
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