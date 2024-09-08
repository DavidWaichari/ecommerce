<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class SubCategory extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id', // Foreign key to Category
        'status',
        'extras',
        'added_by',
        'updated_by'
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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
