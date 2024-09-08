<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Supplier extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'slug',
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
