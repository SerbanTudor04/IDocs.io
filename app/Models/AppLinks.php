<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppLinks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'app_id',
        'url',
        'icon',


    ];
    protected $hidden = [
        'id',

    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apps_links';
}
