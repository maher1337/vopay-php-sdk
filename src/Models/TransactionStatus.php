<?php

namespace maher1337\VoPay\Models;

class TransactionStatus
{
    const PENDING = 'pending';
    const IN_PROGRESS = 'in progress';
    const FAILED = 'failed';
    const CANCELLED = 'cancelled';
    const SUCCESSFUL = 'successful';
}
