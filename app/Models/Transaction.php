<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table = 'tbl_transactions';
    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'transaction_uuid',
        'transaction_provided_id',
        'transaction_provider',
        'transaction_user_reference',
    ];
}
