<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productGens()
    {
        return $this->hasMany(ProductGen::class, 'lnk_cat', 'id');
    }

    public function ArchivedProductGens()
    {
        return $this->hasMany(ProductGen::class,'lnk_cat', 'id')->where('prod_status', 2);
    }

    public function subCategories()
    {
        return $this->hasMany(ProductCat::class, 'lnk_top_cat', 'id');
    }

    public function topCategory()
    {
        return $this->belongsTo(ProductCat::class, 'lnk_top_cat', 'id')->select('cat_name');
    }
}
