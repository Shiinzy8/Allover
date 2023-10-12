<?php

namespace App\Modules\Invoices\Exceptions;

use LogicException;

class InvoiceRejectException extends LogicException
{
    /** @var string */
    public $message = "Invoice can't be rejected";
}
