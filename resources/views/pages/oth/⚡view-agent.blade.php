<?php

use App\Models\Mst_agent;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

new class extends Component
{
    use WithPagination;

    #[Url(history: true, keep: true)]
    public $search = '';
    #[Url(history: true, keep: true, except: '')]
    public $q = '';
    #[Url(except: 10)]
    public $jumlahbaris = 10;

    public $sortColumn = 'name';
    public $sortDirection = 'asc';

    public function updatingJumlahbaris(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingQ(){
        $this->resetPage();
    }

    public function sort($columnName){
        $this->sortColumn = $columnName;
        $this->sortDirection = ($this->sortDirection=='asc'?'desc':'asc');
    }

    public function render()
    {
        $agents = Mst_agent::when($this->search!='', function($q){
            $q->where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('agent_code', 'LIKE', '%'.$this->search.'%');
        })
        ->when($this->q=='top-agency-recognition', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 11)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='multi-billion-builder', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 4)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='the-presidents-club-leader', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 10)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='the-presidents-club-producer', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 38)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='presidents-cabinets-club-leader', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 5)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='presidents-cabinets-club-producer', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 6)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='double-star-club-leader', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 1)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='double-star-club-producer', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 2)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='sc-leader', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 8)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='sc-producer', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 9)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='top-regional', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 40)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='promotion-to-ab', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 12)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='promotion-to-aab', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 13)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='million-dollar-round-table', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_achievements')
                ->where('achievement_id', 12)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='court-of-the-table', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_achievements')
                ->where('achievement_id', 9)
                ->where('active', 'Y');
            });
        })
        ->when($this->q=='top-of-the-table', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_achievements')
                ->where('achievement_id', 44)
                ->where('active', 'Y');
            });
        })
        ->when($this->q!='top-agency-recognition' && 
            $this->q!='multi-billion-builder' && 
            $this->q!='million-dollar-round-table' && 
            $this->q!='court-of-the-table' && 
            $this->q!='top-of-the-table' && 
            $this->q!='presidents-cabinets-club-leader' && 
            $this->q!='presidents-cabinets-club-producer' && 
            $this->q!='double-star-club-leader' && 
            $this->q!='double-star-club-producer' && 
            $this->q!='sc-leader' && 
            $this->q!='sc-producer' && 
            $this->q!='top-regional' && 
            $this->q!='promotion-to-ab' && 
            $this->q!='promotion-to-aab' && 
            $this->q!='the-presidents-club-leader' && 
            $this->q!='the-presidents-club-producer', function($q){
            $q->whereIn('id', function($q1) {
                $q1->select('agent_id')
                ->from('mst_agent_categories')
                ->where('category_id', 999)
                ->where('active', 'Y');
            });
        })
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->jumlahbaris);

        $agents->appends([
            'search' => $this->search,
            'jumlahbaris' => $this->jumlahbaris,
            'q' => $this->q,
        ]);

        return $this->view([
            // Get all posts with latest pagination
            'agents' => $agents,
        ])
        ->layout('layouts::app-oth')
        ->title('Agents List');
    }
};
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <div wire:key="searchV" style="display: flex;gap: 5px;padding-top: 10px;padding-bottom: 10px;">
                <input id="search" type="text" placeholder="search..." class="form-control" wire:model.live.debounce.300ms="search" 
                    style="width: 300px;height:37px;" value="{{ $search }}">
                <select class="mb-3 w-15 mr-3" wire:model.live="jumlahbaris" style="height: 35px;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-sortable">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col" class="sort @if($sortColumn=='name'){{ $sortDirection }}@endif" wire:click="sort('name')">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Achievement</th>
                                <th scope="col">Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agents as $agent)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::disk('public')->exists('agents/'.$agent->photo)?asset('storage/agents/'.$agent->photo):asset('assets/images/blank.png') }}"
                                            alt="{{ $agent->photo }}" width="100">
                                    </td>
                                    <td>{{ ucwords(strtolower($agent->name)).' ('.$agent->agent_code.')' }}</td>
                                    <td>
                                        @php
                                            $cats = '';
                                            $categories = \App\Models\Mst_agent_category::leftJoin('mst_categories AS mc', 'mst_agent_categories.category_id', '=', 'mc.id')
                                            ->select(
                                                'mc.id AS category_id',
                                                'mc.name AS category_name',
                                            )
                                            ->where('mst_agent_categories.agent_id', '=', $agent->id)
                                            ->where('mst_agent_categories.active', '=', 'Y')
                                            ->where('mc.active', '=', 'Y')
                                            ->orderBy('mc.name', 'ASC')
                                            ->get();
                                        @endphp
                                        @foreach ($categories as $category)
                                            @php
                                                $cats .= ucwords(strtolower($category->category_name)).'<br/>';
                                            @endphp
                                        @endforeach
                                        {!! $cats !!}
                                    </td>
                                    <td>
                                        @if ($q!='top-agency-recognition' && 
                                            $q!='multi-billion-builder' && 
                                            $q!='the-presidents-club-leader' && 
                                            $q!='the-presidents-club-producer' && 
                                            $q!='top-regional')
                                            @php
                                                $ach = '';
                                                $achievements = \App\Models\Mst_agent_achievement::leftJoin('mst_achievements AS ma', 'mst_agent_achievements.achievement_id', '=', 'ma.id')
                                                ->select(
                                                    'ma.id AS achievement_id',
                                                    'ma.name AS achievement_name',
                                                )
                                                ->where('mst_agent_achievements.agent_id', '=', $agent->id)
                                                ->where('mst_agent_achievements.active', '=', 'Y')
                                                ->where('ma.active', '=', 'Y')
                                                ->orderBy('ma.order_no', 'ASC')
                                                ->get();
                                            @endphp
                                            @foreach ($achievements as $achievement)
                                                @php
                                                    $ach .= ucwords(strtolower($achievement->achievement_name)).'<br/>';
                                                @endphp
                                            @endforeach
                                            {!! $ach !!}
                                        @endif
                                    </td>
                                    <td>{{ $agent->active }}</td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Agent belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $agents->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>