<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'description',
        'status',
        'extras',
        'updated_by'
    ];

    public function updatedBy()
    {
        return  $this->belongsTo(User::class, 'updated_by');
    }
}
