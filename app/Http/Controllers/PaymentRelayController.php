<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BusinessLogicController;
use App\Classes\Constants;
use App\Classes\Payment;

class PaymentRelayController extends Controller
{
    // Purpose is to redirect request to a correct 
    public function index(Request $request, $providerCode) {

        // Pre declare formatted object
        $payment = new Payment();
        
        // Map payment providers to conventional data

        // Apple
        if ($providerCode === 'Apple') {
            // User reference
            $payment->$reference = $request->$unified_receipt->$Latest_receipt_info->$original_transaction_id;
            // Product ID
            $payment->$product_id = $request->$unified_receipt->$Latest_receipt_info->$product_id;
            // Notification Type
            if ($request->notification_type === 'CANCEL') {
                $payment->$notification_type = Constants::NOTIFICATION_TYPES['cancel'];
            }
            if ($request->notification_type === 'DID_FAIL_TO_RENEW') {
                $payment->$notification_type = Constants::NOTIFICATION_TYPES['failed_to_renew'];
            }
            if ($request->notification_type === 'DID_RENEW') {
                $payment->$notification_type = Constants::NOTIFICATION_TYPES['renewed'];
            }
            if ($request->notification_type === 'INITIAL_BUY') {
                $payment->$notification_type = Constants::NOTIFICATION_TYPES['initial_buy'];
            }

            // Transaction ID
            $payment->$transaction_id = $request->$unified_receipt->$Latest_receipt_info->$transaction_id;
        }

        // Pass the formatted request to business logic
        $business_logic_controller = new BusinessLogicController;

        return $business_logic_controller->index($payment);
    }

}
