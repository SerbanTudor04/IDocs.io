<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminStaffMemberships extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'group_id',
        'user_id',
    ];

    protected $hidden = [
    
    ];


    protected $table = 'users_staff_groups_memberships';
}
