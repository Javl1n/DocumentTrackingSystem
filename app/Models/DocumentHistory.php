<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class DocumentHistory extends Model
{
    use HasFactory;

    protected $with = ['editor'];

    public function document()
    {
        return $this->belongsTo(DocumentDate::class, "document_date_id");
    }

    public function editor()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function file(): MorphOne
    {
        return $this->morphOne(File::class,'fileable');
    }
}
