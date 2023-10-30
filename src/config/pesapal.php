<?php

return [
    /*
     * Pesapal consumer key
     */
    'consumer_key'    => env('PESAPAL_CONSUMER_KEY'),

    /*
     * Pesapal consumer secret
     */
    'consumer_secret' => env('PESAPAL_CONSUMER_SECRET'),

    /*
     * ISO code for the currency
     */
    'currency'        => env('PESAPAL_CURRENCY', 'KES'),

    /*
     * Pesapal environment
     */
    'live'            => env('PESAPAL_LIVE', false),

    /*
     * Route name to handle the callback
     * eg Route::get('donepayment', ['as' => 'paymentsuccess', 'uses'=>'PaymentsController@paymentsuccess']);
     * The route name is "paymentsuccess"
     */
    'callback_route'  => env('PESAPAL_CALLBACK_ROUTE'),

];
