<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGen extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productLiquor()
    {
        return $this->hasOne(ProductLiquor::class, 'lnk_product_gen', 'id');
    }
    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'lnk_def_supplier');
    }
    // public function liquorCategory()
    // {
    //     return $this->hasOne(LiquorCategory::class, 'id', 'lnk_cat');
    // }

    public function suppliers()
    {
        return $this->hasMany(SupplierProduct::class, 'lnk_product', 'id');
    }
    
    public function productMenus()
    {
        return $this->hasOne(ProductMenu::class, 'lnk_product_gen', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCat::class, 'lnk_cat', 'id');
    }
    public function productMenusIsLineItems()
    {
        return $this->hasMany(ProductMenu::class, 'lnk_product_gen', 'id');
    }
    public function prodPreparations()
    {
        return $this->hasMany(ProdPreparation::class, 'lnk_main_product', 'id');
    }
}
