<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLiquor extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'lnk_wine_cats' => 'array',
    ];

    public function liquorBrand()
    {
        return $this->hasOne(LiquorBrand::class, 'id', 'lnk_liquor_brand');
    }

    public function liquorSize()
    {
        return $this->hasOne(LiquorSize::class, 'id', 'lnk_bottle_size');
    }

    // public function suppliers()
    // {
    //     return $this->hasMany(SupplierProduct::class, 'lnk_product', 'id');
    // }
    // public function wineCatagories()
    // {
    //     return $this->hasMany(WineCategory::class, 'id', 'lnk_wine_cats');
    // }
    public function wineCatagories()
    {
        return WineCategory::whereIn('id', $this->lnk_wine_cats)->get();
    }

    public function productGens()
    {
        return $this->hasOne(ProductGen::class, 'id', 'lnk_product_gen');
    }

    // get Liquer Bin
    public function liquorBin()
    {
        return $this->belongsTo(LiquorBin::class, 'lnk_bin_number', 'id');
    }

    public function packageType()
    {
        return $this->belongsTO(PackageType::class, 'lnk_package_type', 'id');
    }
}
