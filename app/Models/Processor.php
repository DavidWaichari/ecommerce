<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Processor extends Model
{
    use HasFactory, HasSlug;

    // Fillable attributes to protect against mass assignment
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status', // Added status attribute
        'extras',
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

      /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name') // Generate slugs from the 'name' column
            ->saveSlugsTo('slug'); // Save the slug to the 'slug' column
    }

    /**
     * Override the route key name for route model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
