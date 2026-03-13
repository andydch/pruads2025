<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mst_agent_achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'achievement_id',
        'active',
        'created_by',
        'updated_by'
    ];
}
