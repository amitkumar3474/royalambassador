<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquorBin extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'lnk_wine_cats' => 'array',
    ];

    public function wineCatagories()
    {
        if (is_array($this->lnk_wine_cats) && !empty($this->lnk_wine_cats)) {
            return WineCategory::whereIn('id', $this->lnk_wine_cats)->pluck('wcat_name');
        }
        return collect(); 
    }

    public function productLiquors()
    {
        return $this->hasMany(ProductLiquor::class, 'lnk_bin_number', 'id');
    }
}
