<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyName extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'property_names';

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
