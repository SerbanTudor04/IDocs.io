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
        'document_id',
        'created_at',
    ];

    protected $hidden = [
        'id',

    ];


    protected $table = 'documents_comments';
}
