<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $with = ['name', 'value'];

    protected $fillable = [];

    protected $table = 'properties';

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function name()
    {
        return $this->belongsTo(PropertyName::class, 'name_id');
    }

    public function value()
    {
        return $this->belongsTo(PropertyValue::class, 'value_id');
    }
}
