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

<section class="team-section__area team-section team-section-2 overflow-hidden section-space" 
    style="background: url({{ asset('assets') }}/imgs/img_bg_agent.jpg) bottom fixed; background-size:contain;">
    <div class="team-section">
        
        <x-search-agent />

        <x-menu />
        
        <div align="center" class="mb-30">
            <img src="{{ asset('assets') }}/imgs/img_text_top_achievers.png" width="300" alt=""/> 
        </div>
    
        <div class="container">
            <div class="team-section__wrapper pl-5 pr-5">
                <div class="row m-auto">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 m-auto">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb" >
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a onclick="displayModal('adch')" style="cursor: pointer;">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">LILIYANA</h3>
                                    <p class="team-section__position">Agency Of the Year 2025</p>
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
                                    <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                                </div>
                                <a onclick="displayModal('{{ ucwords(strtolower($agent->name)) }}')" style="cursor: pointer;">
                                    <div class="team-section__content">
                                        <h3 class="team-section__title">{{ ucwords(strtolower($agent->name)) }}</h3>
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
            
                {{-- <div class="row m-auto">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a onclick="displayModal('adch 12345')" style="cursor: pointer;">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">LILY HALIM</h3>
                                    <p class="team-section__position">Top Executive Agency Builder 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">MARTINUS</h3>
                                    <p class="team-section__position">Top Agency Builder on Agency Builder 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"> 
                                <div class="team-section__content">
                                    <h3 class="team-section__title">LILY HALIM</h3>
                                    <p class="team-section__position">Top Agency Builder 2024</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">LILY HALIM</h3>
                                    <p class="team-section__position">Top Executive Agency Builder 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">MARTINUS</h3>
                                    <p class="team-section__position">Top Agency Builder on Agency Builder 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">LILY HALIM</h3>
                                    <p class="team-section__position">Top Agency Builder 2024</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">LILY HALIM</h3>
                                    <p class="team-section__position">Top Agency Builder 2024</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="team-section__item mb-30">
                            <div class="team-section__thumb">
                                <img src="{{ asset('assets') }}/imgs/foto_agent.png" alt="">
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <div class="team-section__content">
                                    <h3 class="team-section__title">YULIA TININGSIH T.</h3>
                                    <p class="team-section__position">Top Agency Builder - Sharia 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>

{{-- <div>
</div> --}}