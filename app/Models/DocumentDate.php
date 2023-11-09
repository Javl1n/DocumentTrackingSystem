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

    protected $with = ['publisher'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}