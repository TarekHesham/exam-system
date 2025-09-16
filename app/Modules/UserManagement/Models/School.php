<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\ExamManagement\Models\ExamSession;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends BaseModel
{
    protected $fillable = [
        'governorate_id',
        'name',
        'code',
        'address',
        'phone',
        'latitude',
        'longitude',
        'allowed_ip_range',
        'is_active'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_active' => 'boolean',
    ];

    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Governorate::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function schoolAdmins(): HasMany
    {
        return $this->hasMany(SchoolAdmin::class);
    }

    public function activeSchoolAdmins(): HasMany
    {
        return $this->hasMany(SchoolAdmin::class)->where('is_active', true);
    }


    public function teacherAssignments(): HasMany
    {
        return $this->hasMany(TeacherSchoolAssignment::class);
    }

    public function examSessions(): HasMany
    {
        return $this->hasMany(ExamSession::class);
    }

    public function jammingDevices(): HasMany
    {
        return $this->hasMany(JammingDevice::class);
    }
}
