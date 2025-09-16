<?php

namespace App\Core\Models;

class SystemSetting extends BaseModel
{
    protected $fillable = ['setting_key', 'setting_value', 'description', 'data_type', 'is_public'];
}
