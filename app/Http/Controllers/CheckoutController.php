<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {
        
        $price = $request->price;
        $invoice = $request->invoice;
        $option = $request->option;
        $espaysignature = 'sc8n9j0vmqa0ejzi';
        $rq_datetime = Carbon::now()->format('Y-m-d H:i:s');
        $ccy = 'IDR';
        $comm_code = 'SGWPDSINTERNATIONAL';
        $mode = 'SENDINVOICE';
        $salt = strtoupper("##$espaysignature##$invoice##$rq_datetime##$price##$ccy##$comm_code##$mode##");
        $signature = hash('sha256', $salt);
     
     
        if($option == 1) {
            
            return view('checkout', compact('price', 'invoice', 'option'));
        } else {
            $client = new Client();
            try {
                $response = $client->post('https://sandbox-api.espay.id/rest/digitalpay/pushtopay', [
                    'form_params' => ['rq_uuid' => 'PAIDBAQ721659','trx_status' => 'S']
                ]);
    
            } catch(Exception $e) {
                return $e->getMessage();
            }
            
            $data = $response->getBody()->getContents();

            return $data;
            
        }

    }

    public function store(Request $request)
    {
        return $request->all();
    }
}
