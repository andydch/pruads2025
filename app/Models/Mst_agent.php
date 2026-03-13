<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mst_agent extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'agent_code',
        'name',
        'slug',
        'photo',
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
        return $q->where('mst_agents.name', 'like', '%'.$val.'%')
            ->orWhere('mst_agents.agent_code', 'like', '%'.$val.'%');
    }
}
