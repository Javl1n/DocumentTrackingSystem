<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayHealthWorker extends Model
{
    use HasFactory;

    protected $with = ['user', 'barangay'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function access()
    {
        return $this->hasMany(DocumentAccess::class, 'user_id');
    }
}
