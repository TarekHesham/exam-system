<?php

namespace App\Core\Repositories;

use App\Modules\UserManagement\Models\School;

class SchoolRepository
{
    public function find(int $id): ?School
    {
        return School::find($id);
    }
}
