<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDate extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'created_at' => 'date:Y-m-d'
    // ];

    // protected $with = ['document'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
