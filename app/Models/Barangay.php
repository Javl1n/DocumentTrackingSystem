<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(BarangayHealthWorker::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
