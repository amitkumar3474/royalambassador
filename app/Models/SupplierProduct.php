<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'lnk_supplier');
    }
    public function productGens()
    {
        return $this->belongsToMany(ProductGen::class, 'id', 'lnk_product');
    }
}
