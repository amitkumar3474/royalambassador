<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestReserve extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customerContact()
    {
        return $this->belongsTo(CustomerContact::class, 'lnk_customer_contact', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'lnk_customer', 'id');
    }

}
