<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'total_amount',
        'status',
        'extras',
        'supplier_id',
        'updated_by'
    ];

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    
    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }
}
