<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'part_number',
        'series',
        'slug',
        'description',
        'status',
        'is_featured',
        'is_sold',
        'link',
        'featured_image',
        'images',
        'extras',
        'category_id',
        'brand_id',
        'processor_id',
        'selling_price',
        'discount_price',
        'updated_by',
    ];

    protected $casts = [
        'images' => 'array', // This will cast the 'images' attribute to an array
    ];

    protected $appends = [
        'featured_image_url',
        'discount'
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Relationship with Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    // Relationship with Brand
    public function processor()
    {
        return $this->belongsTo(Processor::class, 'processor_id');
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
        if (!empty($this->featured_image)) {
            return '/uploads/featured_images/' . $this->featured_image;
        }
        return $this->category->featured_image_url;
    }

    public function getImagesUrlsAttribute()
    {
        $urls = [];

        if (!empty($this->images)) { // Check if the images array is not empty
            foreach ($this->images as $image) {
                array_push($urls, '/uploads/images/' . $image);
            }
        } else {
            // Ensure the category relationship is properly defined and loaded
            if ($this->category && !empty($this->category->images_urls)) {
                $urls = $this->category->images_urls;
            }
        }

        return $urls;
    }


    public function getDiscountAttribute()
    {
        $discount = $this->selling_price - $this->discount_price;

        return  number_format(($discount / $this->selling_price) * 100, 2);
    }
}
