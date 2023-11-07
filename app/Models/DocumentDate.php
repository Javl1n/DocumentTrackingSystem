<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDate extends Model
{
    use HasFactory;

    // protected $with = ['document'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
