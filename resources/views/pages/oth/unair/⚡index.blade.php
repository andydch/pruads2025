<?php

use App\Models\HalbilUnairModel;
use App\Models\HalbilUnairConfirmModel;
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

    public $sortColumn = 'nama';
    public $sortDirection = 'asc';
    // public $xlsFileAgents;
    // public $xlsFileAgentsCategory;
    // public $xlsFileAgentsAchievement;

    // public function mount(){
    //     $this->search = '';
    // }

    public function updatingJumlahbaris(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function sort($columnName){
        $this->sortColumn = $columnName;
        $this->sortDirection = ($this->sortDirection=='asc'?'desc':'asc');
    }

    public function render()
    {
        $alumni = HalbilUnairModel::select(
            'id',
            'nama',
            'no_hp',
        )
        ->addSelect([
            'confirmDate' => \App\Models\HalbilUnairConfirmModel::select('created_at')
            ->whereColumn('alumni_id', 'halbil_unair_models.id')
            ->orderBy('created_at', 'ASC')
            ->take(1)
        ])
        ->when($this->search!='', function($q){
            $q->where('nama', 'LIKE', '%'.$this->search.'%')
            ->orWhere('no_hp', 'LIKE', '%'.$this->search.'%');
        })
        // ->latest()
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->jumlahbaris);

        $alumni->appends([
            'search' => $this->search,
            'jumlahbaris' => $this->jumlahbaris,
            'q' => $this->q,
        ]);

        return $this->view([
            // Get all posts with latest pagination
            'alumni' => $alumni,
        ])
        ->layout('layouts::app-oth-alumni-unair')
        ->title('Daftar Alumni : Registrasi Halal Bi Halal IKA UNAIR DKI Jakarta 2026');
    }
};
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- flash message -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <!-- end flash message -->

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
                                <th scope="col" class="sort @if($sortColumn=='nama'){{ $sortDirection }}@endif" wire:click="sort('nama')">Nama</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Tanggal/Jam Konfirmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alumni as $a)
                                <tr>
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->no_hp }}</td>
                                    @php
                                        $date = new DateTime($a->confirmDate);
                                    @endphp 
                                    <td>{{ $a->confirmDate!=null?$date->format('d F Y - h:i:s A'):'' }}</td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Alumni tidak ditemukan.
                                </div>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- {{ $alumni->links() }} --}}
                    {{ $alumni->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>
</div>