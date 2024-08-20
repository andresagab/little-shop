<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /// PROPERTIES

    protected $fillable = [
        'name'
    ];

    /// HOOKS
    /// ELOQUENT

    /**
     * Get the products for the category.
     * @return HasMany
     */
    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    /// PRIVATE FUNCTIONS
    /// PUBLIC FUNCTIONS

    /**
     * Check if the category can be deleted.
     * @return bool
     */
    public function can_be_deleted() : bool
    {
        return $this->products()->count() === 0;
    }

    /// STATIC FUNCTIONS

}
