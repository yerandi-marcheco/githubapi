<?php
require __DIR__ . '/vendor/autoload.php';

$recipient = [
    'address1' => '11025 Westlake Dr',
    'city' => 'Charlotte',
    'country_code' =>  'US',
    'zip' => '28273'
];
$items = [
    [
        'variant_id' => 7679,
        'quantity' => 2
    ]
];

$shippingRate = new \Services\ShippingRate(new \Store\Cache());
$result = $shippingRate->storeShippingRate($recipient, $items);

echo json_encode(['data' => $result ? 'The list of available shipping was cached' : 'an unexpected error has occurred']);
