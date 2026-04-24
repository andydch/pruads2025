<?php

use Livewire\Component;
use App\Models\Mst_agent;
use App\Models\Mst_agent_category;
use App\Models\Mst_agent_achievement;
use App\Models\Mst_category;
use App\Models\Mst_achievement;
use Livewire\Attributes\Validate;
use App\Rules\CheckAgentDupRule;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;
    
    public Mst_agent $agent;

    public $name = '';
    public $agent_code = '';
    public $photo;
    public $isActive = false;

    // Array untuk menampung daftar opsi dropdown
    public array $categories = []; 
    public array $categoriesSelected = []; 
    public array $categories1 = []; 
    public array $categories2 = []; 
    public array $achievements = []; 
    public array $achievementsSelected = []; 
    public array $achievements1 = []; 
    public array $achievements2 = []; 
    
    // Properti untuk menampung nilai yang sedang dipilih user pada dropdown
    public string $selectedCategory = '';
    public string $selectedCategory1 = '';
    public string $selectedCategory2 = '';
    public string $selectedAchievement = '';
    public string $selectedAchievement1 = '';
    public string $selectedAchievement2 = '';

    public function mount()
    {
        // ambil kategori yg belum dipilih
        $this->categories = Mst_category::select(
            'id',
            'name'
        )
        ->where('active', 'Y')
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();
        // Log::info('test 3: '.implode(', ', $this->categories2));

        // ambil pencapaian yg belum dipilih
        $this->achievements = Mst_achievement::select(
            'id',
            'name'
        )
        ->where('active', 'Y')
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();
    }

    // Definisikan rules di sini
    protected function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'agent_code' => ['required', 'max:10', 'unique:App\Models\Mst_agent,agent_code'],
            'photo' => ['required', 'image', 'file', 'max:1024', 'dimensions:max_width=500,max_height=500'] ,
        ];
    }

    public function store()
    {
        $this->validate();

        $photoNm = '';
        if ($this->photo){
            // ada photo yg di upload

            $realpath = $_SERVER['DOCUMENT_ROOT'].'/storage/agents/';

            // hapus photo lama jika ada
            if (file_exists($realpath.$this->photo->hashName())) {
            // jalankan hapus file
                unlink($realpath.$this->photo->hashName());
            }

            // simpan photo baru
            $this->photo->storeAs(path: 'agents', name: $this->photo->hashName());

            $photoNm = $this->photo->hashName();
        }

        // update master agent
        $ins = Mst_agent::create([
            'name' => $this->name,
            'agent_code' => $this->agent_code,
            'photo' => $photoNm,
            'active' => $this->isActive?'Y':'N',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        foreach ($this->categories2 as $key => $value) {
            // Log::info('update: '.$value);

            $qCheckCategory = Mst_agent_category::where('agent_id', $ins->id)
            ->where('category_id', $value)
            ->first();
            if ($qCheckCategory){
                $updSetActive = Mst_agent_category::where('agent_id', $ins->id)
                ->where('category_id', $value)
                ->update([
                    'active' => 'Y',
                    'updated_by' => 1,
                ]);
            }else{
                $insNewAgentCategory = Mst_agent_category::create([
                    'agent_id' => $ins->id,
                    'category_id' => $value,
                    'active' => 'Y',
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }
        }
        // update master category - agent - end

        // update master achievement - agent - start
        $updSetNotActive = Mst_agent_achievement::where('agent_id', $ins->id)
        ->update([
            'active' => 'N',
            'updated_by' => 1,
        ]);

        foreach ($this->achievements2 as $key => $value) {
            // Log::info('update: '.$value);

            $qCheckAchievement = Mst_agent_achievement::where('agent_id', $ins->id)
            ->where('achievement_id', $value)
            ->first();
            if ($qCheckAchievement){
                $updSetActive = Mst_agent_achievement::where('agent_id', $ins->id)
                ->where('achievement_id', $value)
                ->update([
                    'active' => 'Y',
                    'updated_by' => 1,
                ]);
            }else{
                $insNewAgentAchievement = Mst_agent_achievement::create([
                    'agent_id' => $ins->id,
                    'achievement_id' => $value,
                    'active' => 'Y',
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }
        }
        // update master achievement - agent - end

        session()->flash('message', 'Data agent Berhasil Diupdate.');

        return redirect()->route('agent.index');
    }

    // Method untuk menambah opsi kategori baru #1
    public function addCategories()
    {
        if (!in_array($this->selectedCategory, $this->categories2)) {

            // copy data ke dropdown no 2
            $this->categories2[] = $this->selectedCategory;

            // cari data yg akan dihapus
            foreach ($this->categories as $key => $value) {
                if ((int)$value['id']===(int)$this->selectedCategory){
                    if (isset($this->categories[$key])){
                        // Jika opsi yang dihapus adalah opsi yang sedang dipilih di dropdown, reset pilihan
                        $this->selectedCategory = '';
                    }

                    // Hapus dari array
                    unset($this->categories[$key]);

                    // Susun ulang index array agar berurutan kembali (wajib untuk Livewire)
                    $this->categories = array_values($this->categories);

                    break;
                }
            }
        }
        // Log::info('test 1: '.implode(', ', $this->categories2));
    }

    // Method untuk menambah opsi kategori baru #2
    public function addCategories2()
    {
        if (!in_array($this->selectedCategory2, $this->categories1)) {

            // copy data ke dropdown no 2
            $this->categories1[] = $this->selectedCategory2;

            // cari data yg akan dihapus
            foreach ($this->categories2 as $key => $value) {
                if ((int)$value===(int)$this->selectedCategory2){
                    if (isset($this->categories2[$key])){
                        // Jika opsi yang dihapus adalah opsi yang sedang dipilih di dropdown, reset pilihan
                        $this->selectedCategory2 = '';
                    }

                    // Hapus dari array
                    unset($this->categories2[$key]);

                    // Susun ulang index array agar berurutan kembali (wajib untuk Livewire)
                    $this->categories2 = array_values($this->categories2);

                    break;
                }
            }
        }
        // Log::info('test 2: '.implode(', ', $this->categories2));
    }

    // Method untuk menambah opsi pencapaian baru #1
    public function addAchievements()
    {
        if (!in_array($this->selectedAchievement, $this->achievements2)) {

            // copy data ke dropdown no 2
            $this->achievements2[] = $this->selectedAchievement;

            // cari data yg akan dihapus
            foreach ($this->achievements as $key => $value) {
                if ((int)$value['id']===(int)$this->selectedAchievement){
                    if (isset($this->achievements[$key])){
                        // Jika opsi yang dihapus adalah opsi yang sedang dipilih di dropdown, reset pilihan
                        $this->selectedAchievement = '';
                    }

                    // Hapus dari array
                    unset($this->achievements[$key]);

                    // Susun ulang index array agar berurutan kembali (wajib untuk Livewire)
                    $this->achievements = array_values($this->achievements);

                    break;
                }
            }
        }
        // Log::info('test 1: '.implode(', ', $this->achievements2));
    }

    // Method untuk menambah opsi pencapaian baru #2
    public function addAchievements2()
    {
        if (!in_array($this->selectedAchievement2, $this->achievements1)) {

            // copy data ke dropdown no 2
            $this->achievements1[] = $this->selectedAchievement2;

            // cari data yg akan dihapus
            foreach ($this->achievements2 as $key => $value) {
                if ((int)$value===(int)$this->selectedAchievement2){
                    if (isset($this->achievements2[$key])){
                        // Jika opsi yang dihapus adalah opsi yang sedang dipilih di dropdown, reset pilihan
                        $this->selectedAchievement2 = '';
                    }

                    // Hapus dari array
                    unset($this->achievements2[$key]);

                    // Susun ulang index array agar berurutan kembali (wajib untuk Livewire)
                    $this->achievements2 = array_values($this->achievements2);

                    break;
                }
            }
        }
        // Log::info('test 2: '.implode(', ', $this->achievements2));
    }

    public function render()
    {
        return $this->view()
        ->layout('layouts::app')
        ->title('Create Agent');
    }
};
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="store" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label">Agent Name</label>
                            <input type="text" class="form-control" wire:model="name" maxlength="255">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Agent Code</label>
                            <input type="text" class="form-control" wire:model="agent_code" maxlength="10">
                            @error('agent_code')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Photo</label>
                            <input type="file" class="form-control" wire:model="photo">
                            @error('photo')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <div style="display: flex; gap: 10px;">
                                <select wire:model.live="selectedCategory" style="width: 100%; padding: 8px;" size="5">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach

                                    @foreach($categories1 as $index => $category1)
                                        @php
                                            $qCategory1 = \App\Models\Mst_category::where('id', $category1)
                                            ->first();
                                        @endphp
                                        @if ($qCategory1)
                                            <option value="{{ $qCategory1->id }}">{{ $qCategory1->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div style="display: flex; gap: 10px;justify-content: center;">
                                <button wire:click.prevent="addCategories" style="padding: 8px 15px; cursor: pointer;">
                                    Add
                                </button>
                                <button wire:click.prevent="addCategories2" style="padding: 8px 15px; cursor: pointer;">
                                    Del
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div style="display: flex; gap: 10px;">
                                <select wire:model.live="selectedCategory2" style="width: 100%; padding: 8px;" size="5">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories2 as $index => $category2)
                                        @php
                                            $qCategory2 = \App\Models\Mst_category::where('id', $category2)
                                            ->first();
                                        @endphp
                                        @if ($qCategory2)
                                            <option value="{{ $qCategory2->id }}">{{ $qCategory2->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Achievement</label>
                            <div style="display: flex; gap: 10px;">
                                <select wire:model.live="selectedAchievement" style="width: 100%; padding: 8px;" size="5">
                                    <option value="">-- Select Achievement --</option>
                                    @foreach($achievements as $achievement)
                                        <option value="{{ $achievement['id'] }}">{{ $achievement['name'] }}</option>
                                    @endforeach

                                    @foreach($achievements1 as $index => $achievement1)
                                        @php
                                            $qAchievement1 = \App\Models\Mst_achievement::where('id', $achievement1)
                                            ->first();
                                        @endphp
                                        @if ($qAchievement1)
                                            <option value="{{ $qAchievement1->id }}">{{ $qAchievement1->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div style="display: flex; gap: 10px;justify-content: center;">
                                <button wire:click.prevent="addAchievements" style="padding: 8px 15px; cursor: pointer;">
                                    Add
                                </button>
                                <button wire:click.prevent="addAchievements2" style="padding: 8px 15px; cursor: pointer;">
                                    Del
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div style="display: flex; gap: 10px;">
                                <select wire:model.live="selectedAchievement2" style="width: 100%; padding: 8px;" size="5">
                                    <option value="">-- Select Achievement --</option>
                                    @foreach($achievements2 as $index => $achievement2)
                                        @php
                                            $qAchievement2 = \App\Models\Mst_achievement::where('id', $achievement2)
                                            ->first();
                                        @endphp
                                        @if ($qAchievement2)
                                            <option value="{{ $qAchievement2->id }}">{{ $qAchievement2->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Active</label>
                            <input wire:model="isActive" type="checkbox" name="isActive">
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SAVE</button>
                        <a href="/{{ ENV('CMS_FOLDER') }}/agents-index" wire:navigate class="btn btn-md btn-secondary">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>