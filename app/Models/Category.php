<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Fillable attributes to protect against mass assignment
    protected $fillable = [
        'name',
        'description',
        'status', // Added status attribute
        'extras',
        'added_by',
        'updated_by'
    ];

    // Status scope to filter categories by status
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    // Relationship with SubCategory
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    // Relationship with Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Accessor for uppercase category name
    public function getUppercaseNameAttribute()
    {
        return strtoupper($this->name);
    }

    public function updatedBy()
    {
        return  $this->belongsTo(User::class, 'updated_by');
    }
}
