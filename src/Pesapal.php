<?php

namespace Subhra\Pesapal;

use Subhra\Pesapal\PesapalHelper;

class Pesapal
{
    protected $helper;

    public function __construct($api = 'demo')
    {
        if (config('pesapal.live'))
            $api = 'live';

        $this->helper = new PesapalHelper($api);
    }

    public function initiatePayment($orderData)
    {
        $consumerKey = config('pesapal.consumer_key');
        $consumerSecret = config('pesapal.consumer_secret');

        $access = $this->helper->getAccessToken($consumerKey, $consumerSecret);
        $access_token = $access->token;

        $callback_url = route(config('pesapal.callback_route'));

        $IPN_response = $this->helper->getNotificationId($access_token, $callback_url);
        $IPN_id = $IPN_response->ipn_id;

        $order = $orderData;
        $order['notification_id'] = $IPN_id;
        $order['callback_url'] = $callback_url;

        // return $this->helper->getMerchertOrderURL($order, $access_token);
        $data = $this->helper->getMerchertOrderURL($order, $access_token);
        $iframe_src = "";
        if ($data->redirect_url) {
            $iframe_src = $data->redirect_url;
        }

        return '<iframe src="' . $iframe_src . '" width="100%" height="100%" scrolling="auto" frameBorder="0"> <p>Unable to load the payment page</p> </iframe>';
    }

    public function getTransactionStatus($orderTrackingId)
    {
        $consumerKey = config('pesapal.consumer_key');
        $consumerSecret = config('pesapal.consumer_secret');

        $access = $this->helper->getAccessToken($consumerKey, $consumerSecret);
        $access_token = $access->token;

        return $this->helper->getTransactionStatus($orderTrackingId, $access_token);
    }
}
