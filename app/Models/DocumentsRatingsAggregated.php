<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsRatingsAggregated extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     **/
    
    protected $fillable = [
        'name',
        'content',
        'rating',
        'created_by',
        'updated_by',
        'document_id',
    ];

    /**
     * The attributes that should be hidden for serialization. 
     * @var array<int, string>
     */
    protected $hidden = [
        'id',

    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apps_documents_ratings_aggregated';
}
