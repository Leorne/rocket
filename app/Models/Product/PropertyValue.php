<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyValue extends Model
{
    use HasFactory;

    protected $fillable = ['value'];

    protected $table = 'property_values';

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
