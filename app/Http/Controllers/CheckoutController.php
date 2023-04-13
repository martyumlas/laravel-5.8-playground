<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {
        
        $price = $request->price;
        $invoice = $request->invoice;
        $option = $request->option;

        if($option == 1) {
            
            return view('checkout', compact('price', 'invoice', 'option'));
        } else {
            $client = new Client([
                'base_uri' => 'https://sandbox-kit.espay.id/index/order/',
            ]);

            $response = $client->request('GET', 'endpoint', [
                'query' => [
                    'productCode' => 002,
                    'commCode' => 'SGWPDSINTERNATIONAL'
                ]
            ]);

            $data = $response->getBody()->getContents();

            return $data;
            
        }

    }

    public function store(Request $request)
    {
        return $request->all();
    }
}
