<?php

namespace App\Modules\Invoices\Repositories;

use App\Domain\Enums\StatusEnum;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Invoices\Exceptions\InvoiceApproveException;
use App\Modules\Invoices\Exceptions\InvoiceRejectException;
use App\Modules\Invoices\Models\Invoice;
use LogicException;

class InvoiceRepository
{
    public function __construct(
        public ApprovalFacadeInterface $approvalService,
    )
    {
    }

    public function approve(Invoice $invoice): bool
    {
        try {
            $this->approvalService->approve(new ApprovalDto($invoice->id, $invoice->status, $invoice::class));
        } catch (LogicException $ex) {
            throw new InvoiceApproveException();
        }

        Invoice::query()
            ->where(['id' => $invoice->id, 'status' => StatusEnum::DRAFT])
            ->update(['status' => StatusEnum::APPROVED]);

        return $invoice->refresh()->status == StatusEnum::APPROVED;
    }

    public function rejected(Invoice $invoice): bool
    {
        try {
            $this->approvalService->reject(new ApprovalDto($invoice->id, $invoice->status, $invoice::class));
        } catch (LogicException $ex) {
            throw new InvoiceRejectException();
        }

        Invoice::query()
            ->where(['id' => $invoice->id, 'status' => StatusEnum::DRAFT])
            ->update(['status' => StatusEnum::REJECTED]);

        return $invoice->refresh()->status == StatusEnum::REJECTED;
    }
}
