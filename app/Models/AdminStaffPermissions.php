<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminStaffPermissions extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'group_id',
        'description',
        'code',
    ];

    protected $table = 'users_staff_groups_permissions';
}
