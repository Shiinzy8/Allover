<?php

namespace App\Modules\Invoices\Exceptions;

use LogicException;

class InvoiceApproveException extends LogicException
{
    /** @var string */
    public $message = "Invoice can't be approved";
}
