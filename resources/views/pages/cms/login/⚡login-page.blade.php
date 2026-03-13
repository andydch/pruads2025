<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    
    #[Validate('required|max:255')]
    public $user_id;

    #[Validate('required|max:255')]
    public $pwd;

    public function goLgn()
    {
        $this->validate();// insert data

        $userLogin = ([
            'email' => $this->user_id,
            'password' => $this->pwd,
        ]);

        if (Auth::attempt($userLogin)){
            // redirect to index
            return redirect()->route('agent.index');
        }else{
            session()->flash('message_error','Unknown email or password');
        }
    }

    public function render()
    {
        return $this->view()
        ->layout('layouts::app')
        ->title('Login');
    }
};
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="goLgn" enctype="application/x-www-form-urlencoded">

                        <div class="mb-3">
                            <label class="form-label">User ID</label>
                            <input type="text" class="form-control" wire:model="user_id" maxlength="255">
                            @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model="pwd" maxlength="255">
                            @error('pwd')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary" wire:loading.attr="disabled">
                            <span wire:loading wire:target="goLgn()" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            LOGIN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>