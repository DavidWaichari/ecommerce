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
        'slug',
        'description',
        'status',
        'is_featured',
        'is_sold',
        'featured_image',
        'images',
        'extras',
        'category_id',   // Foreign key to Category
        'brand_id',   // Foreign key to Category
        'selling_price',
        'discount_price',
        'updated_by',
    ];

    protected $casts = [
        'images' => 'array', // This will cast the 'images' attribute to an array
    ];


    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Relationship with Category
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
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
