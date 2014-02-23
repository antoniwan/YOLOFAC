<?php

class Payment extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

    private static function getApiContext()
    {
        $apiContext = new PayPal\Rest\ApiContext(
            new PayPal\Auth\OAuthTokenCredential(
                'AeYVnxAd3jV9UKhRKkkopkkqel7PXD3RmykiYMCP2p4-QQfNLCoO4zuUS16y',
                'EO0FBBBixSwvyhLm6npknjmLSBLXrfTCFGF8kHoBLeY3o6mMcT0Re7UobYwI'
            )
        );

        $apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => public_path('uploads/PayPal.log'),
                'log.LogLevel' => 'FINE'
            )
        );

        return $apiContext;
    }

    public static function generateUserPaymentAuthorization($dare)
    {

        $apiContext = self::getApiContext();

        $payer = new PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $item = new PayPal\Api\Item();
        $item->setName('YOLO Dare')->setCurrency('USD')->setQuantity($dare->donation_quantity)->setPrice($dare->donation_amount);

        $itemList = new PayPal\Api\ItemList();
        $itemList->setItems(array($item));

        $amount = new PayPal\Api\Amount();
        $amount->setCurrency('USD')->setTotal($dare->donation_amount * $dare->donation_quantity);

        $transaction = new PayPal\Api\Transaction();
        $transaction->setAmount($amount)->setItemList($itemList)->setDescription('YOLO for a cause payment');

        $redirectUrls = new PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(URL::to('/payment/success'))->setCancelUrl(URL::to('/payment/cancel'));

        $payment = new PayPal\Api\Payment();
        $payment->setIntent("authorize")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($apiContext);
        } catch (PayPal\Exception\PPConnectionException $ex) {
            echo "Exception: " . $ex->getMessage() . PHP_EOL;
            var_dump($ex->getData());
            exit(1);
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirectUrl = $link->getHref();
                break;
            }
        }

        Session::put('paymentId', $payment->getId());
        Session::put('dare_id', $dare->id);

        if(isset($redirectUrl))
            return $redirectUrl;
    }

    public static function successfulPayment()
    {
        $apiContext = self::getApiContext();

        $paymentId = Session::get('paymentId');

        $payment = PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new PayPal\Api\PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        $result = $payment->execute($execution, $apiContext);

        $authorizationId = $result->transactions[0]->related_resources[0]->authorization->id;
        $dare_id = Session::get('dare_id');

        $dare = Dare::find($dare_id);

        $dbpayment = new Payment;
        $dbpayment->authorization_id = $authorizationId;

        $dare->payments()->save($dbpayment);
    }

    public static function cancelledPayment()
    {
        echo "User cancelled a payment, delete the dare.";
    }

    public function dare()
    {
        return $this->belongsTo('Dare');
    }
}