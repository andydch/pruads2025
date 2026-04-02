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

    public function render()
    {
        $agents = Mst_agent::when($this->search!='', function($q){
            $q->where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('agent_code', 'LIKE', '%'.$this->search.'%');
        })
        // ->when($this->q=='top-agency-recognition', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 11)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='multi-billion-builder', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 4)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='the-presidents-club-leader', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 10)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='the-presidents-club-producer', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 38)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='presidents-cabinets-club-leader', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 5)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='presidents-cabinets-club-producer', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 6)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='double-star-club-leader', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 1)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='double-star-club-producer', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 2)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='sc-leader', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 8)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='sc-producer', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 9)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='top-regional', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 40)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='promotion-to-ab', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 12)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='promotion-to-aab', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 13)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='million-dollar-round-table', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_achievements')
        //         ->where('achievement_id', 12)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='court-of-the-table', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_achievements')
        //         ->where('achievement_id', 9)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q=='top-of-the-table', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_achievements')
        //         ->where('achievement_id', 44)
        //         ->where('active', 'Y');
        //     });
        // })
        // ->when($this->q!='top-agency-recognition' && 
        //     $this->q!='multi-billion-builder' && 
        //     $this->q!='million-dollar-round-table' && 
        //     $this->q!='court-of-the-table' && 
        //     $this->q!='top-of-the-table' && 
        //     $this->q!='presidents-cabinets-club-leader' && 
        //     $this->q!='presidents-cabinets-club-producer' && 
        //     $this->q!='double-star-club-leader' && 
        //     $this->q!='double-star-club-producer' && 
        //     $this->q!='sc-leader' && 
        //     $this->q!='sc-producer' && 
        //     $this->q!='top-regional' && 
        //     $this->q!='promotion-to-ab' && 
        //     $this->q!='promotion-to-aab' && 
        //     $this->q!='the-presidents-club-leader' && 
        //     $this->q!='the-presidents-club-producer', function($q){
        //     $q->whereIn('id', function($q1) {
        //         $q1->select('agent_id')
        //         ->from('mst_agent_categories')
        //         ->where('category_id', 999)
        //         ->where('active', 'Y');
        //     });
        // })
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
        ->title('Template Agents List');
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

            <div class="team-section__wrapper pl-5 pr-5 pb-15">
                <div class="row m-auto">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-6 m-auto">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb" >
                                <img src="assets/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#agentModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">Liliyana</h3>
                                    <p class="team-section__position">Agency Of the Year 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row m-auto">
                    @forelse ($agents as $agent)
                        <div class="{{ ENV("GRID_AGENTS") }}" style="justify-content: center;display: grid;">
                            <div class="team-section__item mb-30">
                                <div class="team-section__thumb">
                                    <img src="{{ url('/assets/imgs/foto_agent.png') }}" alt="">
                                </div>
                                <a onclick="displayModal('{{ $agent->name }}', 'achievement', 'slug')" style="cursor: pointer;">
                                    <div class="team-section__content">
                                        <h3 class="team-section__title">{{ $agent->name }}</h3>
                                        <p class="team-section__position">Top Executive Agency Builder 2025</p>
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