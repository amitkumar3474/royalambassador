<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class, 'lnk_event', 'id');
    }

    public function itineraryTemplate()
    {
        return $this->belongsTo(ItineraryTemplate::class, 'lnk_itin_tmpl', 'id');
    }

}
