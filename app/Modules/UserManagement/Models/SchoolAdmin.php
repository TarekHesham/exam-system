<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;
use App\Modules\Authentication\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolAdmin extends BaseModel
{
    protected $fillable = [
        'user_id',
        'school_id',
        'admin_permissions',
        'is_active',
        'assigned_at',
    ];

    protected $casts = [
        'admin_permissions' => 'array',
        'is_active' => 'boolean',
        'assigned_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->admin_permissions ?? []);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForSchool($query, int $schoolId)
    {
        return $query->where('school_id', $schoolId);
    }
}
