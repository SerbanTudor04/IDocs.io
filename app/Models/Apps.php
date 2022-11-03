<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apps extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id',



    ];
    protected $hidden = [

    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apps';
}
