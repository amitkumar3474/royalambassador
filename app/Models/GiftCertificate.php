<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCertificate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'lnk_buyer', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'lnk_user_insert', 'id');
    }
}
