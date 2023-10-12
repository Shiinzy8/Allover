<?php

namespace App\Modules\Invoices\Exceptions;

use App\Infrastructure\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
     public function render($request, Throwable $exception)
    {
        return match($exception::class) {
            InvoiceApproveException::class => response()->json(
                ['error' => "Invoice can't be approved"],
                Response::HTTP_NOT_FOUND,
            ),
            InvoiceRejectException::class => response()->json(
                ['error' => "Invoice can't be rejected"],
                Response::HTTP_NOT_FOUND,
            ),
            'default' => parent::render($request, $exception)
        };
    }
}
