<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'lnk_supplier');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'lnk_user_prepare');
    }
}
