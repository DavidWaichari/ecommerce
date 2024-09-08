<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug;

    // Fillable attributes to protect against mass assignment
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
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
