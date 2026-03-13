<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mst_agent_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'category_id',
        'active',
        'created_by',
        'updated_by'
    ];
}
