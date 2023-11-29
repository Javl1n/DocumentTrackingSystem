<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class DocumentTemplate extends Model
{
    use HasFactory, Search;

    protected $searchable = [
        'name'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function file(): MorphOne
    {
        return $this->morphOne(File::class,'fileable');
    }


}
