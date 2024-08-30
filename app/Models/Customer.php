<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Contacts()
    {
        return $this->hasMany(CustomerContact::class, 'lnk_customer', 'id');
    }

    public function storedPayMethod()
    {
        return $this->hasOne(StoredPayMethod::class, 'lnk_customer', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'lnk_cur_account_owner', 'id');
    }
    public function events()
    {
        return $this->hasMany(Event::class, 'lnk_customer', 'id');
    }
    public function restReserve()
    {
        return $this->hasMany(RestReserve::class, 'lnk_customer', 'id');
    }
    public function giftCertificates()
    {
        return $this->hasMany(GiftCertificate::class, 'lnk_buyer', 'id');
    }
}
