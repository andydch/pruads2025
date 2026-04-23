<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\HalbilUnairModel;
use App\Models\HalbilUnairConfirmModel;

new class extends Component
{
    #[Validate('required|max:255')]
    public $no_hp_alumni;

    public $nama;
    public $fakultas;
    public $angkatan;
    public $instansi;
    public $no_hp_konfirmasi;
    public $jam_konfirmasi;

    public function mount(){
        //
    }

    public function goLgn()
    {
        $this->validate();// insert data

        $qAlumni = HalbilUnairModel::whereRaw('REPLACE(REPLACE(no_hp, \'-\', \'\'), \' \', \'\')=\''.$this->no_hp_alumni.'\'')
        ->first();
        if ($qAlumni){
            $this->nama = $qAlumni->nama;
            $this->fakultas = $qAlumni->fakultas;
            $this->angkatan = $qAlumni->angkatan;
            $this->instansi = $qAlumni->instansi;
            $this->no_hp_konfirmasi = $qAlumni->no_hp;

            $insConfirm = HalbilUnairConfirmModel::create([
                'alumni_id' => $qAlumni->id,
            ]);

            $qConfirm = HalbilUnairConfirmModel::where('alumni_id', $qAlumni->id)
            ->orderBy('created_at', 'ASC')
            ->first();
            if ($qConfirm){
                $this->jam_konfirmasi = $qConfirm->created_at;
            }
        }else{
            $this->nama = '';
            $this->fakultas = '';
            $this->angkatan = '';
            $this->instansi = '';
            $this->no_hp_konfirmasi = '';
            $this->jam_konfirmasi = '';
        }
    }

    public function render()
    {
        return $this->view()
        ->layout('layouts::app-oth-alumni-unair')
        ->title('Registrasi Halal Bi Halal IKA UNAIR DKI Jakarta 2026');
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
                            <label class="form-label">Masukkan no HP</label>
                            <input type="text" class="form-control" wire:model="no_hp_alumni" maxlength="255" placeholder="format: 0812345678 atau +62912345678">
                            @error('no_hp_alumni')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary" wire:loading.attr="disabled">
                            <span wire:loading wire:target="goLgn()" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Konfirmasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <label class="form-label col-md-2">Nama:</label>
                        <label class="form-label col-md-10">{{ $nama }}</label>
                    </div>
                    <div class="row">
                        <label class="form-label col-md-2">Fakultas:</label>
                        <label class="form-label col-md-10">{{ $fakultas }}</label>
                    </div>
                    <div class="row">
                        <label class="form-label col-md-2">Angkatan:</label>
                        <label class="form-label col-md-10">{{ $angkatan }}</label>
                    </div>
                    <div class="row">
                        <label class="form-label col-md-2">Instansi:</label>
                        <label class="form-label col-md-10">{{ $instansi }}</label>
                    </div>
                    <div class="row">
                        <label class="form-label col-md-2">No HP:</label>
                        <label class="form-label col-md-10">{{ $no_hp_konfirmasi }}</label>
                    </div>
                    @php
                        $date = new DateTime($jam_konfirmasi);
                    @endphp
                    <div class="row">
                        <label class="form-label col-md-2">Jam Konfirmasi:</label>
                        <label class="form-label col-md-10">{{ $jam_konfirmasi!=null?$date->format('d F Y - h:i:s A'):'' }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>