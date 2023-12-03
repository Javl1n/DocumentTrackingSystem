<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class DocumentDate extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'created_at' => 'date:Y-m-d'
    // ];

    protected $with = ['history'];

        
    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function file(): MorphOne
    {
        return $this->morphOne(File::class,'fileable');
    }

    public function history()
    {
        return $this->hasMany(DocumentHistory::class);
    }
}
