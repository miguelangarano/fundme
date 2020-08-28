<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentData extends Controller
{
    public function createDataToken(){
        $stripe = new \Stripe\StripeClient('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
        $customer = $stripe->customers->create([
            'description' => 'example customer',
            'email' => 'email@example.com',
            'payment_method' => 'pm_card_visa',
        ]);
        echo $customer;

        $curl = new \Stripe\HttpClient\CurlClient();
        $curl->setTimeout(10); // default is \Stripe\HttpClient\CurlClient::DEFAULT_TIMEOUT
        $curl->setConnectTimeout(5); // default is \Stripe\HttpClient\CurlClient::DEFAULT_CONNECT_TIMEOUT

        echo $curl->getTimeout(); // 10
        echo $curl->getConnectTimeout(); // 5

        // tell Stripe to use the tweaked client
        \Stripe\ApiRequestor::setHttpClient($curl);
        $curl = new \Stripe\HttpClient\CurlClient([CURLOPT_PROXY => 'proxy.local:80']);
        // tell Stripe to use the tweaked client
        \Stripe\ApiRequestor::setHttpClient($curl);

        \Stripe\Stripe::setLogger($logger);

        $customer = $stripe->customers->create([
            'description' => 'example customer',
        ]);
        echo $customer->getLastResponse()->headers['Request-Id'];


        $curl = new \Stripe\HttpClient\CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1]);
        \Stripe\ApiRequestor::setHttpClient($curl);

        $customers = $stripe->customers->all([],[
            'api_key' => 'sk_test_...',
            'stripe_account' => 'acct_...'
        ]);
        
        $stripe->customers->retrieve('cus_123456789', [], [
            'api_key' => 'sk_test_...',
            'stripe_account' => 'acct_...'
        ]);


        $stripe = new \Stripe\StripeClient(
            'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
          );
          $stripe->charges->create([
            'amount' => 2000,
            'currency' => 'usd',
            'source' => 'tok_amex',
            'description' => 'My First Test Charge (created for API docs)',
          ]);
    }

    public function encryptCardData(){
        
    }
}
