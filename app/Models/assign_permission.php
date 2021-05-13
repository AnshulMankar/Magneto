<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assign_permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'relation_id',
        'type',
        'permission_id'
    ];
}
