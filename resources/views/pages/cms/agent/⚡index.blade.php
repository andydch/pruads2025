<?php

use App\Models\Mst_agent;
use App\Imports\AgentImport;
use App\Imports\AgentCategoryImport;
use App\Imports\AgentAchievementImport;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;

new class extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Url(history: true, keep: true)]
    public $search = '';
    #[Url(history: true, keep: true, except: '')]
    public $q = '';
    #[Url(except: 10)]
    public $jumlahbaris = 10;

    public $sortColumn = 'name';
    public $sortDirection = 'asc';
    public $xlsFileAgents;
    public $xlsFileAgentsCategory;
    public $xlsFileAgentsAchievement;

    // public function mount(){
    //     $this->search = '';
    // }

    public function updatingJumlahbaris(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function uplAgents(){
        $rules = [
            'xlsFileAgents'=>'required|file|max:2048|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ];
        $messages = [
            'xlsFileAgents.required' => 'Please select the file to upload.',
            'xlsFileAgents.file' => 'Please select the file to upload.',
            'xlsFileAgents.max' => 'The file size is too large. Max 2MB.',
            'xlsFileAgents.mimetypes' => 'The file must be a file of type: xlsx.',
        ];
        $validated = $this->validate($rules,$messages);

        $realpath = '';
        $newFilename = '';
        $oriExt = $this->xlsFileAgents->extension();
        $newFilename = uniqid().'_'.strtotime('now').'.'.$oriExt;
        $this->xlsFileAgents->storeAs(path: 'xls', name: $newFilename);
        $realpath = $_SERVER['DOCUMENT_ROOT'].'/storage/xls/';

        Excel::import(new AgentImport, $realpath.$newFilename);
        if (file_exists($realpath.$newFilename)) {
            // jalankan hapus file
            unlink($realpath.$newFilename);
        }

        session()->flash('message','Data Agent uploaded successfully');
    }

    public function uplAchievementAgents(){
        $rules = [
            'xlsFileAgentsAchievement'=>'required|file|max:2048|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ];
        $messages = [
            'xlsFileAgentsAchievement.required' => 'Please select the file to upload.',
            'xlsFileAgentsAchievement.file' => 'Please select the file to upload.',
            'xlsFileAgentsAchievement.max' => 'The file size is too large. Max 2MB.',
            'xlsFileAgentsAchievement.mimetypes' => 'The file must be a file of type: xlsx.',
        ];
        $validated = $this->validate($rules,$messages);

        $realpath = '';
        $newFilename = '';
        $oriExt = $this->xlsFileAgentsAchievement->extension();
        $newFilename = uniqid().'_'.strtotime('now').'.'.$oriExt;
        $this->xlsFileAgentsAchievement->storeAs(path: 'xls', name: $newFilename);
        $realpath = $_SERVER['DOCUMENT_ROOT'].'/storage/xls/';

        Excel::import(new AgentAchievementImport, $realpath.$newFilename);
        if (file_exists($realpath.$newFilename)) {
            // jalankan hapus file
            unlink($realpath.$newFilename);
        }

        session()->flash('message','Data Agent Achievement uploaded successfully');
    }

    public function uplCategoryAgents(){
        $rules = [
            'xlsFileAgentsCategory'=>'required|file|max:2048|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ];
        $messages = [
            'xlsFileAgentsCategory.required' => 'Please select the file to upload.',
            'xlsFileAgentsCategory.file' => 'Please select the file to upload.',
            'xlsFileAgentsCategory.max' => 'The file size is too large. Max 2MB.',
            'xlsFileAgentsCategory.mimetypes' => 'The file must be a file of type: xlsx.',
        ];
        $validated = $this->validate($rules,$messages);

        $realpath = '';
        $newFilename = '';
        $oriExt = $this->xlsFileAgentsCategory->extension();
        $newFilename = uniqid().'_'.strtotime('now').'.'.$oriExt;
        $this->xlsFileAgentsCategory->storeAs(path: 'xls', name: $newFilename);
        $realpath = $_SERVER['DOCUMENT_ROOT'].'/storage/xls/';

        Excel::import(new AgentCategoryImport, $realpath.$newFilename);
        if (file_exists($realpath.$newFilename)) {
            // jalankan hapus file
            unlink($realpath.$newFilename);
        }

        session()->flash('message','Data Agent Category uploaded successfully');
    }

    public function delete($id)
    {
        $agent = Mst_agent::findOrFail($id);

        // delete data
        $agent->where('id', '=', $id)
        ->update([
            'active' => 'N',
        ]);

        // flash message
        session()->flash('message', 'Data Agent Berhasil Dihapus.');
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
        // ->latest()
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
        ->layout('layouts::app')
        ->title('Agents List');
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

            <div class="card border-0 rounded shadow-sm">
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
            </div>
            <div class="card border-0 rounded shadow-sm">
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
            </div>
            <div class="card border-0 rounded shadow-sm">
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
            </div>

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
                                <th scope="col" style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agents as $agent)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::disk('public')->exists('agents/'.$agent->photo)?asset('storage/agents/'.$agent->photo):asset('assets/images/blank.png') }}"
                                            alt="{{ $agent->photo }}" width="100">
                                    </td>
                                    <td>{{ $agent->name.' ('.$agent->agent_code.')' }}</td>
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
                                                $cats .= $category->category_name.' (ID: '.$category->category_id.')<br/>';
                                            @endphp
                                        @endforeach
                                        {!! $cats !!}
                                    </td>
                                    <td>
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
                                                $ach .= $achievement->achievement_name.' (ID: '.$achievement->achievement_id.')<br/>';
                                            @endphp
                                        @endforeach
                                        {!! $ach !!}
                                    </td>
                                    <td>{{ $agent->active }}</td>
                                    <td class="text-center">
                                        {{-- <a href="/edit/{{ $agent->id }}" wire:navigate
                                            class="btn btn-sm btn-primary">
                                            EDIT
                                        </a> --}}

                                        <button
                                            class="btn btn-sm btn-danger"
                                            onclick="confirm('Yakin ingin menghapus data ini?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $agent->id }})">
                                            DELETE
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Agent belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- {{ $agents->links() }} --}}
                    {{ $agents->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>
</div>