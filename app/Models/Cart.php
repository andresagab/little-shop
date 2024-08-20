<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    /// PROPERTIES

    protected $fillable = [
        'user_id',
        'status',
        'is_active',
    ];

    /// HOOKS
    /// ELOQUENT

    /**
     * Get the user for the cart.
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the cart items for the cart.
     * @return HasMany
     */
    public function cart_items() : HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /// PRIVATE FUNCTIONS
    /// PUBLIC FUNCTIONS

    /**
     * Get the total for the cart.
     * @return float
     */
    public function getTotalAttribute() : float
    {
        $total = 0;

        # check if the cart has items
        if ($this->cart_items) {
            # get total with raw sql
            $total = $this->cart_items()->sum(DB::raw('price * quantity'));
        }

        return $total;
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
