<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $espayMerchantKey;
    private $returnUrl;
    private $baseUrl;
    public $invoiceId;
    public $amount;

    public function __construct() {
        $this->espayMerchantKey = 'c120ee852ac32f5ef97077276ac10e6c';
        // $this->returnUrl = route('espay-return-url');"http://127.0.0.1:8000/"
        $this->returnUrl = "http://127.0.0.1:8000/";
        $this->baseUrl = 'https://sandbox-kit.espay.id/espaysingle/paymentlist';
        $this->invoiceId = 'PDS-00001-Juls';
        $this->amount = 1.00;
    }

    public function espay(Request $request) {
        dd($request);
    }

    public function payNow() {
        $espaysignature = 'sc8n9j0vmqa0ejzi';
        $order_id = 'INV001';
        $rq_datetime = '2023-12-19 06:00:00';
        $amount = 754000.00;
        $ccy = 'IDR';
        $comm_code = 'SGWPDSINTERNATIONAL';
        $mode = 'SENDINVOICE';
        $salt = strtoupper("##$espaysignature##$order_id##$rq_datetime##$amount##$ccy##$comm_code##$mode##");

        $signature = hash('sha256', $salt);
        $seedForm = array(
            'key' => $this->espayMerchantKey,
            'backUrl' => $this->returnUrl,
            'orderId' => $this->invoiceId
        );

        return view('pay', compact('seedForm'));
    }

    public function signature() {
        $espaysignature = 'sc8n9j0vmqa0ejzi';
        $order_id = 'INV001';
        $rq_datetime = '2023-12-19 06:00:00';
        $amount = 754000.00;
        $ccy = 'IDR';
        $comm_code = 'SGWPDSINTERNATIONAL';
        $mode = 'SENDINVOICE';
        $salt = strtoupper("##$espaysignature##$order_id##$rq_datetime##$amount##$ccy##$comm_code##$mode##");

        $signature = hash('sha256', $salt);

        echo $signature;
    }
}
