<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'badge',
        'price',
        'currency',
        'price_type',
        'short_description',
        'description',
        'features',
        'specs',
        'image_url',
        'is_featured',
        'in_stock',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'specs' => 'array',
        'is_featured' => 'boolean',
        'in_stock' => 'boolean',
        'price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->price_type === 'custom_quote' || empty($this->price)) {
            return 'Custom Quote';
        }
        $formatted = number_format($this->price, 0);
        if ($this->price_type === 'starting_at') {
            return "From {$this->currency} {$formatted}";
        }
        return "{$this->currency} {$formatted}";
    }
}
