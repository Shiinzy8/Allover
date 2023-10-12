<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Http\Controllers\Api;

use App\Domain\Enums\StatusEnum;
use App\Infrastructure\Controller;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Invoices\Exceptions\InvoiceApproveException;
use App\Modules\Invoices\Http\Resources\InvoiceResource;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Repositories\InvoiceRepository;
use Illuminate\Http\JsonResponse;
use LogicException;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    public function __construct(
        public InvoiceRepository $repository,
    ) {}

    public function show(Invoice $invoice): InvoiceResource
    {
        return new InvoiceResource($invoice);
    }

    public function approve(Invoice $invoice): JsonResponse
    {
        return $this->getResponse($this->repository->approve($invoice));
    }

    public function reject(Invoice $invoice): JsonResponse
    {
        return $this->getResponse($this->repository->rejected($invoice));
    }

     private function getResponse(bool $result): JsonResponse
    {
        $statusCode = $result ? Response::HTTP_OK : Response::HTTP_UNPROCESSABLE_ENTITY;
        return response()->json([], $statusCode);
    }
}
