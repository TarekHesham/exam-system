<?php

namespace App\Http\Controllers\Api\V1\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherSchoolResource;
use App\Modules\UserManagement\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function __invoke()
    {
        /** @var Teacher $teacher */
        $teacher = Auth::user();

        if (! $teacher instanceof Teacher) {
            return $this->errorResponse('Unauthorized', 403);
        }

        return $this->successResponse(
            TeacherSchoolResource::collection($teacher->schools()->get()),
            'Fetched teacher schools successfully'
        );
    }
}
