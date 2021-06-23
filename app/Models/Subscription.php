<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $table = 'tbl_subscriptions';
    protected $primaryKey = 'subscription_id';

    protected $fillable = [
        'subscription_uuid',
        'subscription_valid_until',
        'subscription_user_reference',
        'subscription_status',
    ];
}
