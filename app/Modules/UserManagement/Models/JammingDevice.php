<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;

class JammingDevice extends BaseModel
{
    protected $fillable = [
        'school_id',
        'device_serial',
        'device_model',
        'device_status',
        'coverage_radius_meters',
        'location_description',
        'last_maintenance'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
