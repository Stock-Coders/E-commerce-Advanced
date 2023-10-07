<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory, Model, 
    SoftDeletes, Relations\BelongsTo,
    Relations\hasMany,
};

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function create_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }

    public function update_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function rating(): hasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function wishlist(): hasMany
    {
        return $this->hasMany(Wishlist::class);
    }
}
