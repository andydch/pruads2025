<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HalbilUnairConfirmModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'alumni_id',
    ];
}
