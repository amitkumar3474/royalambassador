<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $casts = [
        'lnk_child_facilities' => 'array', // To cast JSON to array
    ];
    use HasFactory;
    protected $guarded = [];
    public function eventFacilities()
    {
        return $this->hasMany(EventFacility::class, 'lnk_facility', 'id');
    }
    
    public function childFacilities()
    {
        $childFacilityIds = $this->lnk_child_facilities ?? [];
        return Facility::whereIn('id', $childFacilityIds)->get();
    }
}
