<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // ADD THIS PROPERTY:
    protected $fillable = ['name', 'slug'];

    // One Category has many Products
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}