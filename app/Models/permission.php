<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'permission_title',
        'permission_slug',
        'permission_route',
        'permission_group',
        'permission_description'
    ];
}
