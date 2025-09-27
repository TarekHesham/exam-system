<?php

namespace App\Http\Controllers\Api\V1\Shared;

use App\Core\Contracts\Services\GovernorateServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\GovernorateResource;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    protected GovernorateServiceInterface $service;

    public function __construct(GovernorateServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $paginate = $this->service->listGovernorates((int)$perPage);

        return $this->successResponsePaginate(
            GovernorateResource::collection($paginate),
            $paginate,
            'Governorates fetched successfully.'
        );
    }

    public function show(int $id)
    {
        $governorateDTO = $this->service->getGovernorate($id);
        if (!$governorateDTO) return $this->errorResponse('Governorate not found.', 404);

        return $this->successResponse(
            new GovernorateResource((object) $governorateDTO),
            'Governorate fetched successfully.'
        );
    }
}
