<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /// PROPERTIES

    protected $fillable = [
        'name',
        'description',
        'price',
        'amount',
        'image_path',
        'category_id',
    ];

    /// HOOKS
    /// ELOQUENT

    /**
     * Get the category for the product.
     * @return BelongsTo
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the cart items for the product.
     * @return HasMany
     */
    public function cart_items() : HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /// PRIVATE FUNCTIONS
    /// PUBLIC FUNCTIONS

    /**
     * Check if the product can be bought.
     * @return bool
     */
    public function can_be_bought(): bool
    {
        return $this->amount > 0;
    }

    /**
     * Check if the product can be deleted.
     * @return bool
     */
    public function can_be_deleted(): bool
    {
        return $this->cart_items()->count() === 0;
    }

    /// STATIC FUNCTIONS

}
