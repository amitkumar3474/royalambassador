<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachedDocument extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function docCategory()
    {
        return $this->hasOne(AttachedDocCategory::class, 'id', 'lnk_cat');
    }
}
