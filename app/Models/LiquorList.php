<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquorList extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function liquorListItems()
    {
        return $this->hasMany(LiquorListItem::class, 'lnk_liquor_list', 'id');
    }
}
