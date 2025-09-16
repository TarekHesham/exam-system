<?php

namespace App\Modules\UserManagement\Models;

use App\Core\Models\BaseModel;

class Governorate extends BaseModel
{
    protected $fillable = ['name', 'code', 'is_active'];

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
