<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFacility extends Model
{
    use HasFactory;
    protected $guarded = [];
   
    public function event()
    {
        return $this->belongsTo(Event::class, 'lnk_event', 'id');
    }
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'lnk_facility', 'id');
    }
    public function facilityPricing()
    {
        return $this->belongsTo(FacilityPricing::class, 'lnk_pricing', 'id');
    }
}
