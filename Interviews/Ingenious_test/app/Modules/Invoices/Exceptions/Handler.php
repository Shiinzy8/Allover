<?php

namespace App\Modules\Invoices\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        return match ($e::class) {
            InvoiceApproveException::class, InvoiceRejectException::class => response()->json(
                ['error' => $e->getMessage()],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            ),
            default => parent::render($request, $e),
        };
    }
}
