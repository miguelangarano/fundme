<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class PaymentData extends Controller
{
    public function createDataToken($cardData, $price){
        $charge= "";
        return $charge;
    }

    public function encryptCardData(Request $request){
      /*$cardData = [
        'number' => '4242424242424242',
        'exp_month' => 8,
        'exp_year' => 2021,
        'cvc' => '314',
      ];*/
      $cardData = [
        'number' => strval($request->cardnumber),
        'exp_month' => (int)$request->cardmonth,
        'exp_year' => (int)$request->cardyear,
        'cvc' => strval($request->cardcvc),
      ];
      
      $stripe = new \Stripe\StripeClient(
        'sk_test_51GujAgAtKROFnPJMsUwcgQfJOlbFcXQqLgbfsoy5qKdbElvRi9rtz51SUmlx8OjyJsW44wS0OhjiYQ5wHZgydLAa006fX7BoR8'
      );
      
      $token = $stripe->tokens->create([
        'card' => $cardData
      ]);
      //return json_encode($request->price);
      $charge = $stripe->charges->create([
        'amount' => (double)$request->price*100,
        'currency' => 'usd',
        'source' => $token,
        'description' => 'My First Test Charge (created for API docs)',
      ]);
      //$charge = createDataToken($cardData, $request->price);
      
      if($charge->status=="succeeded"){
        $ret = $this->setFunds($request->price, "-MGMRsPI_1eDk_2vnxTc");
        //return json_encode($ret);
      }
      
      $responseData = new \stdClass();
      $responseData->message = "Pago registrado";
      $responseData->code = 0;
      $responseData->body = $charge;
      return json_encode($responseData);
    }

    public function setFunds($fund, $projectId){
      $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase/firebase.json');
      $database = $factory->createDatabase();
      $reference = $database->getReference('projects/'.$projectId."/currentIncome");
      $snapshot = $reference->getSnapshot();
      $value = $snapshot->getValue();
      $newvalue = $fund + $value;
      //return ('projects/'.$projectId."/currentIncome");
      $reference = $database->getReference('projects/'.$projectId."/currentIncome")->set($newvalue);
  }
}
