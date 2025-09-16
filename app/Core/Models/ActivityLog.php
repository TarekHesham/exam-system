<?php

namespace App\Core\Models;

use App\Modules\Authentication\Models\User;

class ActivityLog extends BaseModel
{
    protected $fillable = [
        'user_id',
        'action_type',
        'model_type',
        'model_id',
        'old_values',
        'new_values',
        'ip_address',
        'user_agent',
        'performed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
