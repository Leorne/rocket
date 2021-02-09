<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'count'
    ];

    public function scopeFilter($query, ...$filters)
    {
        foreach ($filters as $filter) {
            $filter->apply($query);
        }
        return $query;
    }
}
