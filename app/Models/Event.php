<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'lnk_sales_person' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'lnk_customer', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(CustomerContact::class, 'lnk_customer_contact', 'id');
    }
    
    public function eventType()
    {
        return $this->belongsTo(EventType::class,'lnk_event_type', 'id');
    }
    public function eventFacilities()
    {
        return $this->hasMany(EventFacility::class, 'lnk_event', 'id');
    }
    public function floorPlans()
    {
        return $this->hasMany(FloorPlan::class, 'lnk_event', 'id');
    }
    public function itinerary()
    {
        return $this->hasOne(Itinerary::class, 'lnk_event', 'id');
    }

    // public function salesPersons()
    // {
    //     // dd($this->lnk_sales_person);
    //     return User::whereIn('id', $this->lnk_sales_person)->get();
    // }
    public function salesPersons()
    {
        return Staff::whereIn('id', $this->lnk_sales_person)->get();
    }
}
