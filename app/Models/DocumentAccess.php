<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAccess extends Model
{
    use HasFactory;

    public function hasAccess()
    {
        return $this->belongsTo(BarangayHealthWorker::class, "user_id");
    }

    public function document()
    {
        return $this->belongsTo(DocumentDate::class, 'document_date_id');
    }
}
