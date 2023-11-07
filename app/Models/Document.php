<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $with = ['barangay', 'template', 'dates'];

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }

    public function template(){
        return $this->belongsTo(DocumentTemplate::class, "document_template_id");
    }

    public function dates(){
        return $this->hasMany(DocumentDate::class);
    }
}
