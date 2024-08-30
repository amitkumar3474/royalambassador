<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlan extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function event()
    // {
    //     return $this->belongsToMany(Event::class, 'floor_plans', 'id', 'lnk_event');
    // }

    // public function floorPlanRoom()
    // {
    //     return $this->belongsToMany(FloorPlanRoom::class, 'floor_plans', 'id', 'lnk_fplan_room');
    // }
    public function event()
    {
        return $this->belongsTo(Event::class, 'lnk_event', 'id');
    }

    public function floorPlanRoom()
    {
        return $this->belongsTo(FloorPlanRoom::class, 'lnk_fplan_room', 'id');
    }
}
