<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mst_category extends Model
{
    use HasFactory, Sluggable, Notifiable;

    protected $fillable = [
        'name',
        'slug',
        'active',
        'created_by',
        'updated_by'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeSearch($q, $val)
    {
        return $q->where('name', 'like', '%'.$val.'%');
    }
}
