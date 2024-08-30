<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'lnk_user', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'lnk_customer', 'id');
    }
}
