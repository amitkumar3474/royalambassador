<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contacts()
    {
        return $this->hasMany(SupplierContact::class, 'lnk_supplier', 'id');
    }

    public function supplierProducts()
    {
        return $this->hasMany(SupplierProduct::class, 'lnk_supplier', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(ProductGen::class, 'supplier_products','lnk_supplier', 'lnk_product')->where('lnk_cat', 22);
    }
    
}
