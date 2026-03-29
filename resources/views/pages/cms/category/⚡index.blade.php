<?php

use App\Models\Mst_category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

new class extends Component
{
    use WithPagination;

    #[Url(history: true, keep: true)]
    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete($id)
    {
        $category = Mst_category::findOrFail($id);

        // delete data
        $category->where('id', '=', $id)
        ->update([
            'active'=>'N',
        ]);

        // flash message
        session()->flash('message', 'Data Category Berhasil Dihapus.');
    }

    public function render()
    {
        $categories = Mst_category::latest()
        ->when($this->search!='', function($q){
            $q->where('name', 'LIKE', '%'.$this->search.'%');
        })
        ->paginate(15);

        $categories->appends([
            'search' => $this->search,
        ]);

        return $this->view([
            // Get all posts with latest pagination
            'categories' => $categories,
        ])
        ->layout('layouts::app')
        ->title('Categories List');
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
                <input id="search" type="text" placeholder="search..." class="form-control" wire:model.live.debounce.300ms="search" 
                    style="width: 300px;height:37px;" value="{{ $search }}">
                <a href="/{{ ENV('CMS_FOLDER').'/category-create/' }}" wire:navigate
                    class="btn btn-md btn-success rounded shadow-sm border-0 mb-3">
                    ADD NEW CATEGORY
                </a>
            </div>

            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Category Name</th>
                                <th scope="col">Active</th>
                                <th scope="col">Updated at</th>
                                <th scope="col" style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ ucwords(strtolower($category->name)).' (ID: '.$category->id.')' }}</td>
                                    <td>{{ $category->active }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="/{{ ENV('CMS_FOLDER').'/category-edit/'.$category->id }}" wire:navigate
                                            class="btn btn-sm btn-primary">
                                            EDIT
                                        </a>

                                        <button
                                            class="btn btn-sm btn-danger"
                                            onclick="confirm('Yakin ingin menghapus data ini?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $category->id }})">
                                            DELETE
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Category belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>