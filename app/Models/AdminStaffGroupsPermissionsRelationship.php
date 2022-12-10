<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminStaffGroupsPermissionsRelationship extends Model
{
    
    use HasFactory;
    
    protected $fillable = [
        'group_id',
        'permission_id',
    ];

    protected $hidden = [   
    ];


    protected $table = 'users_staff_groups_permissions_relation';
}
