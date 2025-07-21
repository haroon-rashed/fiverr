<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'category_values',
        'description',
        'faq',
        'base_price',
        'standard_price',
        'premium_price',
        'tags',
        'images',
        'user_id',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'standard_price' => 'decimal:2',
        'premium_price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Helper method to get category values as array
    public function getCategoryValuesArray()
    {
        return $this->category_values ? explode(',', $this->category_values) : [];
    }

    // Helper method to get tags as array
    public function getTagsArray()
    {
        return $this->tags ? explode(',', $this->tags) : [];
    }
}