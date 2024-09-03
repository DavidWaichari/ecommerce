<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'status',
        'is_featured',
        'extras',
        'category_id',   // Foreign key to Category
        'sub_category_id', // Foreign key to SubCategory
        'added_by',
        'updated_by',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with SubCategory
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function updatedBy()
    {
        return  $this->belongsTo(User::class, 'updated_by');
    }
}
