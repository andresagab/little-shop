<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    /// PROPERTIES

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    /// HOOKS
    /// ELOQUENT

    /**
     * Get the cart for the product.
     * @return BelongsTo
     */
    public function cart() : BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the product for the cart.
     * @return BelongsTo
     */
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /// PRIVATE FUNCTIONS
    /// PUBLIC FUNCTIONS

    /**
     * Check if the cart item can be deleted.
     * @return bool
     */
    public function can_be_deleted(): bool
    {
        # if the cart is unconfirmed or confirmed
        # it item can't be deleted
        return $this->cart->status == 'UC' || $this->cart->status == 'CN';
    }

    /// STATIC FUNCTIONS

}
