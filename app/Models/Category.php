<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, SoftDeletes};

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function create_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }

    public function update_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'update_user_id', 'id');
    }

    public function subCategory(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Product::class);
    }
}
