<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;

    public function document()
    {
        return $this->belongsTo(DocumentDate::class, 'document_date_id');
    }
}
