<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsComments extends Model
{
    use HasFactory;



    
    protected $fillable = [
        'content',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'document_id',
        'id',

    ];

    protected $hidden = [
    
    ];


    protected $table = 'apps_documents_comments';
}
