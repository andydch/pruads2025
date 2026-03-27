<?php

use App\Models\Mst_achievement;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        $achievement = Mst_achievement::findOrFail($id);

        // delete data
        $achievement->where('id', '=', $id)
        ->update([
            'active'=>'N',
        ]);

        // flash message
        session()->flash('message', 'Data Achievement Berhasil Dihapus.');
    }

    public function render()
    {
        return $this->view([
            // Get all posts with latest pagination
            'achievements' => Mst_achievement::latest()
            ->when($this->search!='', function($q){
                $q->where('name', 'LIKE', '%'.$this->search.'%');
            })
            ->paginate(150),
        ])
        ->layout('layouts::app')
        ->title('Achievement List');
    }
};
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- flash message -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <!-- end flash message -->

            <div style="display: flex;gap: 5px;">
                <input type="text" placeholder="search..." class="form-control" wire:model.live="search" style="width: 300px;height:37px;">
                <a href="/{{ ENV('CMS_FOLDER').'/achievement-create/' }}" wire:navigate
                    class="btn btn-md btn-success rounded shadow-sm border-0 mb-3">
                    ADD NEW ACHIEVEMENT
                </a>
            </div>

            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Achievement Name</th>
                                <th scope="col">Order No</th>
                                <th scope="col">Active</th>
                                <th scope="col">Updated at</th>
                                <th scope="col" style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($achievements as $achievement)
                                <tr>
                                    <td>{{ $achievement->name.' (ID: '.$achievement->id.')' }}</td>
                                    <td>{{ $achievement->order_no }}</td>
                                    <td>{{ $achievement->active }}</td>
                                    <td>{{ $achievement->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="/{{ ENV('CMS_FOLDER').'/achievement-edit/'.$achievement->id }}" wire:navigate
                                            class="btn btn-sm btn-primary">
                                            EDIT
                                        </a>

                                        <button
                                            class="btn btn-sm btn-danger"
                                            onclick="confirm('Yakin ingin menghapus data ini?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $achievement->id }})">
                                            DELETE
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Achievement belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $achievements->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>