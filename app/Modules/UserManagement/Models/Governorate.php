<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;

class Governorate extends BaseModel
{
    protected $fillable = ['name', 'code', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
