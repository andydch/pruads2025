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

    // public function uplAgents(){
    //     $rules = [
    //         'xlsFileAgents'=>'required|file|max:2048|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    //     ];
    //     $messages = [
    //         'xlsFileAgents.required' => 'Please select the file to upload.',
    //         'xlsFileAgents.file' => 'Please select the file to upload.',
    //         'xlsFileAgents.max' => 'The file size is too large. Max 2MB.',
    //         'xlsFileAgents.mimetypes' => 'The file must be a file of type: xlsx.',
    //     ];
    //     $validated = $this->validate($rules,$messages);

    //     $realpath = '';
    //     $newFilename = '';
    //     $oriExt = $this->xlsFileAgents->extension();
    //     $newFilename = uniqid().'_'.strtotime('now').'.'.$oriExt;
    //     $this->xlsFileAgents->storeAs(path: 'xls', name: $newFilename);
    //     $realpath = $_SERVER['DOCUMENT_ROOT'].'/storage/xls/';

    //     Excel::import(new AgentImport, $realpath.$newFilename);
    //     if (file_exists($realpath.$newFilename)) {
    //         // jalankan hapus file
    //         unlink($realpath.$newFilename);
    //     }

    //     session()->flash('message','Data Agent uploaded successfully');
    // }

    // public function uplAchievementAgents(){
    //     $rules = [
    //         'xlsFileAgentsAchievement'=>'required|file|max:2048|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    //     ];
    //     $messages = [
    //         'xlsFileAgentsAchievement.required' => 'Please select the file to upload.',
    //         'xlsFileAgentsAchievement.file' => 'Please select the file to upload.',
    //         'xlsFileAgentsAchievement.max' => 'The file size is too large. Max 2MB.',
    //         'xlsFileAgentsAchievement.mimetypes' => 'The file must be a file of type: xlsx.',
    //     ];
    //     $validated = $this->validate($rules,$messages);

    //     $realpath = '';
    //     $newFilename = '';
    //     $oriExt = $this->xlsFileAgentsAchievement->extension();
    //     $newFilename = uniqid().'_'.strtotime('now').'.'.$oriExt;
    //     $this->xlsFileAgentsAchievement->storeAs(path: 'xls', name: $newFilename);
    //     $realpath = $_SERVER['DOCUMENT_ROOT'].'/storage/xls/';

    //     Excel::import(new AgentAchievementImport, $realpath.$newFilename);
    //     if (file_exists($realpath.$newFilename)) {
    //         // jalankan hapus file
    //         unlink($realpath.$newFilename);
    //     }

    //     session()->flash('message','Data Agent Achievement uploaded successfully');
    // }

    // public function uplCategoryAgents(){
    //     $rules = [
    //         'xlsFileAgentsCategory'=>'required|file|max:2048|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    //     ];
    //     $messages = [
    //         'xlsFileAgentsCategory.required' => 'Please select the file to upload.',
    //         'xlsFileAgentsCategory.file' => 'Please select the file to upload.',
    //         'xlsFileAgentsCategory.max' => 'The file size is too large. Max 2MB.',
    //         'xlsFileAgentsCategory.mimetypes' => 'The file must be a file of type: xlsx.',
    //     ];
    //     $validated = $this->validate($rules,$messages);

    //     $realpath = '';
    //     $newFilename = '';
    //     $oriExt = $this->xlsFileAgentsCategory->extension();
    //     $newFilename = uniqid().'_'.strtotime('now').'.'.$oriExt;
    //     $this->xlsFileAgentsCategory->storeAs(path: 'xls', name: $newFilename);
    //     $realpath = $_SERVER['DOCUMENT_ROOT'].'/storage/xls/';

    //     Excel::import(new AgentCategoryImport, $realpath.$newFilename);
    //     if (file_exists($realpath.$newFilename)) {
    //         // jalankan hapus file
    //         unlink($realpath.$newFilename);
    //     }

    //     session()->flash('message','Data Agent Category uploaded successfully');
    // }

    // public function delete($id)
    // {
    //     $a = Mst_agent::findOrFail($id);

    //     // delete data
    //     $a->where('id', '=', $id)
    //     ->update([
    //         'active' => 'N',
    //     ]);

    //     // flash message
    //     session()->flash('message', 'Data Agent Berhasil Dihapus.');
    // }

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

            {{-- <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="uplAgents" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Upload Agent <span style="font-size: small;">(Format: Agent Code|Agent Name|Photo File Name|Active Status (without column header))</span></label>
                            <input type="file" class="form-control" wire:model="xlsFileAgents">
                            @error('xlsFileAgents')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary" wire:loading.attr="disabled">
                            <span wire:loading wire:target="uplAgents()" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            UPLOAD
                        </button>
                    </form>
                </div>
            </div> --}}
            {{-- <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="uplCategoryAgents" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Upload Agent Category <span style="font-size: small;">(Format: Agent Code|Category ID|Active Status (without column header))</span></label>
                            <input type="file" class="form-control" wire:model="xlsFileAgentsCategory">
                            @error('xlsFileAgentsCategory')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary" wire:loading.attr="disabled">
                            <span wire:loading wire:target="uplCategoryAgents()" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            UPLOAD
                        </button>
                    </form>
                </div>
            </div> --}}
            {{-- <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="uplAchievementAgents" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Upload Agent Achievement <span style="font-size: small;">(Format: Agent Code|Achievement ID|Active Status (without column header))</span></label>
                            <input type="file" class="form-control" wire:model="xlsFileAgentsAchievement">
                            @error('xlsFileAgentsAchievement')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary" wire:loading.attr="disabled">
                            <span wire:loading wire:target="uplAchievementAgents()" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            UPLOAD
                        </button>
                    </form>
                </div>
            </div> --}}

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
                                <th scope="col" class="sort @if($sortColumn=='name'){{ $sortDirection }}@endif" wire:click="sort('name')">Nama</th>
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