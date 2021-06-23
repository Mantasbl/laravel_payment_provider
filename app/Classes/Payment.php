<?php

namespace App\Classes;

class Payment
{
    public int $id;
    public string $reference;
    public int $product_id;
    public string $notification_type;
    public int $transaction_id;

    public function __construct(int $id, string $reference, int $product_id, string $notification_type, int $transaction_id)
    {
        $this->id = $id;
        $this->reference = $reference;
        $this->product_id = $product_id;
        $this->notification_type = $notification_type;
        $this->transaction_id = $transaction_id;
    }
}
