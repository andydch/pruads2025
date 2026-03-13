<?php

use App\Models\Mst_category;
use Livewire\Component;
use Livewire\Attributes\Validate;

new class extends Component
{
    
    #[Validate('required|max:255')]
    public $name;

    public function store()
    {
        $this->validate();// insert data
        Mst_category::create([
            'name'   => $this->name,
            'active' => 'Y',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // flash message
        session()->flash('message', 'Data Category Berhasil Disimpan.');

        // redirect to index
        return redirect()->route('category.index');
    }

    public function render()
    {
        return $this->view()
        ->layout('layouts::app')
        ->title('Create Category');
    }
};
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="store" enctype="application/x-www-form-urlencoded">

                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" wire:model="name" maxlength="255">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SAVE</button>
                        <a href="/{{ ENV('CMS_FOLDER') }}/category-index" wire:navigate class="btn btn-md btn-secondary">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>