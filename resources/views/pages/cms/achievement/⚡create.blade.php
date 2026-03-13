<?php

use App\Models\Mst_achievement;
use Livewire\Component;
use Livewire\Attributes\Validate;

new class extends Component
{
    
    #[Validate('required|max:255')]
    public $name;

    #[Validate('required|numeric|integer|min:1')]
    public $order_no;

    public function store()
    {
        $this->validate();// insert data
        Mst_achievement::create([
            'name'   => $this->name,
            'order_no'   => $this->order_no,
            'active' => 'Y',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // flash message
        session()->flash('message', 'Data Achievement Berhasil Disimpan.');

        // redirect to index
        return redirect()->route('achievement.index');
    }

    public function render()
    {
        return $this->view()
        ->layout('layouts::app')
        ->title('Create Achievement');
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
                            <label class="form-label">Achievement Name</label>
                            <input type="text" class="form-control" wire:model="name" maxlength="255">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Achievement Order No</label>
                            <input type="text" class="form-control" wire:model="order_no" maxlength="3">
                            @error('order_no')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SAVE</button>
                        <a href="/{{ ENV('CMS_FOLDER') }}/achievement-index" wire:navigate class="btn btn-md btn-secondary">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>