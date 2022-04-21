<?php

namespace App\Http\Controllers;

use App\Http\Controllers\forntend\CheckoutController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;
use PayPalHttp\IOException;

class PaypalController extends Controller
{
    public function getCheckout(){
    $clientId = env('PAYPAL_CLIENT_ID');
    $clientSecret = env('PAYPAL_CLIENT_SECRET');

    if (get_setting('paypal_sandbox')==1){
        $environment = new SandboxEnvironment($clientId,$clientSecret);
    }else{
        $environment = new ProductionEnvironment($clientId,$clientSecret);
    }
    $client = new  PayPalHttpClient($environment);
    $order  = Order::findOrFail(session()->get('order_id'));

    $amount = $order->total_amount;

    $request = new OrdersCreateRequest();

    $request->prefer('return=representation');

    $request->body = [
        "intent" => "CAPTURE",
        "purchase_units" => [[
            "reference_id" => rand(0000,9999),
            "amount" => [
                "value" => number_format($amount,2,'.',''),
                "currency_code" => session('system_default_currency_info')->code,
            ]
        ]],
        "application_context" => [
            "cancel_url" => url('paypal/payment/cancel'),
            "return_url" => url('paypal/payment/done'),
        ]
    ];
        try {
            $response = $client->execute($request);
            return Redirect::to($response->result->links[1]->href);
        } catch (\HttpException $ex) {
            dd($ex);
        }
    }

    public function getCancel(Request $request){
        $request->session()->forget('order_id');
        return \redirect()->route('homes')->with('errors','Sorry payment cancelled');
    }

    public function getDone(Request $request){
        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_CLIENT_SECRET');

        if (get_setting('paypal_sandbox')==1){
            $environment = new SandboxEnvironment($clientId,$clientSecret);
        }else{
            $environment = new ProductionEnvironment($clientId,$clientSecret);
        }
        $client = new PayPalHttpClient($environment);

        $orderCaptureRequest = new OrdersCaptureRequest($request->token);
        $orderCaptureRequest->prefer('return=representation');

        try {
            $response  = $client->execute($orderCaptureRequest);
            $checkoutController = new CheckoutController;
            return $checkoutController->checkout_done($request->session()->get('order_id'),json_encode($response));
        }
        catch (\HttpException $ex){
            dd($ex);
        }




    }
}
