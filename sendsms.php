<?php

require_once __DIR__ . 'sendsms.php';
use Nexmo\Client;

// Your Nexmo API key and secret
$apiKey = '5b25b9e9';
$apiSecret = 'CLfoY0hIa2Oq8pvG';

// Create a new Nexmo client
$client = new Client($apiKey, $apiSecret);

// Set the from and to numbers, and the message
$from = '9978275972';
$to = '8155872217';
$message = 'Hello Welcome to Azadi ka Amrit Mahotsav';

// Send the message
try {
    $client->message()->send([
        'to' => $to,
        'from' => $from,
        'text' => $message
    ]);
    echo "The message was sent successfully\n";
} catch (Exception $e) {
    echo "The message was not sent. Error: " . $e->getMessage() . "\n";
}