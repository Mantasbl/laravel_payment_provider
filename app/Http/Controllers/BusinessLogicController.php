<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessLogicController extends Controller
{
    public function index($formattedRequest) {
        // Pull notification_type and process request accordingly
        $notification_type = $formattedRequest->$notification_type;

        // Process Cancel Transaction
        if ($notification_type === Constants::NOTIFICATION_TYPES['cancel']) {

        }

        // Process Fail To Renew Transaction
        if ($notification_type === Constants::NOTIFICATION_TYPES['failed_to_renew']) {

        }

        // Process Reviewed Transaction
        if ($notification_type === Constants::NOTIFICATION_TYPES['renewed']) {

        }

        // Process Initial Buy Transaction
        if ($notification_type === Constants::NOTIFICATION_TYPES['initial_buy']) {

        }
    }
}