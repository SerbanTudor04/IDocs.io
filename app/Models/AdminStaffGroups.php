<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminStaffGroups extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'description',
        'app_id'
    ];

    protected $hidden = [
    
    ];


    protected $table = 'users_staff_groups';
}

