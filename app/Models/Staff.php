<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $casts = [
        'departments' => 'array',
    ];
    protected $table = "staffs";
    protected $guarded = [];

    public function departments()
    {
        return Department::whereIn('id', $this->departments)->pluck('dept_name')->toArray();
    }
    public function user(){
        return $this->belongsTo(User::class, 'lnk_user', 'id');
    }
    public function staffSchedulePlans(){
        return $this->hasMany(StaffSchedulePlan::class, 'lnk_staff', 'id');
    }
}
