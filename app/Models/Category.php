<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, HasSlug;

    // Fillable attributes to protect against mass assignment
    protected $fillable = [
        'name',
        'slug',
        'featured_image',
        'images',
        'description',
        'icon',
        'status', // Added status attribute
        'extras',
        'has_processor',
        'updated_by'
    ];

    protected $appends = [
        'featured_image_url', 'discount','images_urls'
    ];

    // Cast 'images' attribute to array
    protected $casts = [
        'images' => 'array',
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

    public function getFeaturedImageUrlAttribute()
    {
        return '/uploads/categories/featured_images/'.$this->featured_image;
    }
    public function getImagesUrlsAttribute()
    {
        $urls = [];
            foreach ($this->images as $image) {
                array_push($urls, '/uploads/categories/images/'.$image);
            }
        return $urls;
    }

}
