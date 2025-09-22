<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;

class TeacherSchoolAssignment extends BaseModel
{
    protected $fillable = [
        'teacher_id',
        'school_id',
        'assignment_type', // 'teaching', 'supervision', 'correction'
        'is_active',
        'assigned_at'
    ];

    public $casts = [
        'assigned_at' => 'datetime',
        'is_active'   => 'boolean',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
