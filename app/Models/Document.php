<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $with = ['barangay', 'template', 'dates'];

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['barangay'] ?? false, fn($query, $category) =>
    //         $query->whereHas('', fn ($query) =>
    //             $query->where('slug', $category)
    //         )
    //     );
    // }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function template()
    {
        return $this->belongsTo(DocumentTemplate::class, 'document_template_id');
    }

    public function dates()
    {
        return $this->hasMany(DocumentDate::class)->orderBy('date', 'desc');
    }
}
