<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAccess extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(BarangayHealthWorker::class);
    }

    public function document()
    {
        return $this->belongsTo(DocumentDate::class, 'document_date_id');
    }
}
