<?php

use Livewire\Component;

new class extends Component
{
    public $stringTemp = 'adch';

    public function render()
    {
        // $agents = Mst_agent::when($this->search!='', function($q){
        //     $q->where('name', 'LIKE', '%'.$this->search.'%')
        //     ->orWhere('agent_code', 'LIKE', '%'.$this->search.'%');
        // })
        // // ->latest()
        // ->orderBy($this->sortColumn, $this->sortDirection)
        // ->paginate($this->jumlahbaris);

        // $agents->appends([
        //     'search' => $this->search,
        //     'jumlahbaris' => $this->jumlahbaris,
        //     'q' => $this->q,
        // ]);

        return $this->view([
            // Get all posts with latest pagination
            'agents' => [],
            'stringTemp' => $this->stringTemp,
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
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <div>
</div> --}}