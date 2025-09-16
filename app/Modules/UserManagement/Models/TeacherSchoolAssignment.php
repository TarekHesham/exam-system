<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;

class TeacherSchoolAssignment extends BaseModel
{
    protected $fillable = ['teacher_id', 'school_id', 'assignment_type', 'is_active', 'assigned_at'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
