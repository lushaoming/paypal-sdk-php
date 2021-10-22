<?php
/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 15:03
 */

require_once './vendor/autoload.php';


use Echolove\PayPal\Core\BillingAddress;
use Echolove\PayPal\Core\BreakDown;
use Echolove\PayPal\Core\Item;
use Echolove\PayPal\Core\Order;
use Echolove\PayPal\Core\Payer;
use Echolove\PayPal\Core\PurchaseUnit;

//var_dump(get_included_files());
//exit;

$lineItems = [
    [
        'productId' => 107310,
        'name' => 'Argus 2 1-pack',
        'price' => '100.99',
        'quantity' => 2
    ],
    [
        'productId' => 107311,
        'name' => 'Argus 2 2-pack',
        'price' => '180.99',
        'quantity' => 1
    ],
];

$itemTotal = 0;
foreach ($lineItems as $lineItem) {
    $itemTotal += ($lineItem['price'] * $lineItem['quantity']);
}

$itemTotal = number_format($itemTotal, 2, '.', '');
$shippingTotal = '10';
$discountTotal = '9.99';
$taxTotal = '18.98';

$total = (float)$itemTotal + (float)$shippingTotal + (float)$taxTotal - (float)$discountTotal;
$total = number_format($total, 2, '.', '');

$order = new Order(
    'AZmxCkO6kuCToUq7Y6KgXasKor6XT9K_Qa4fZ0-L90HwJAUmiPeM-AvmLaOgYEPGHxn0DDt3Mkrf6ICs',
    'EDnLn-W3xnYzglCD6PRbeAq0tPdngnmLhd91TpLazQx047MOLXXuHWsj2qLzg8z1CiTTyCBj1dW5GNgF',
    [
        'mode' => 'sandbox', // sandbox / live
        'log.LogEnabled' => 1, // 1 / 0
        'log.FileName' => __DIR__.'/PayPal.log',
        'log.LogLevel' => 'INFO', // Sandbox Environments: DEBUG, INFO, WARN, ERROR; Live Environments: INFO, WARN, ERROR
        'validation.level' => 'disable',
        'cache.enabled' => 1, // 1 / 0
        'cache.FileName' => __DIR__.'/auth.cache',
    ]
);

$order->setCurrency('USD');


$address = new BillingAddress();
$address->setCountryCode('US')->setPostalCode('10001')->setAdminArea1('NY')->setAdminArea2('New York')
    ->setAddressLine1('Street Number')->setAddressLine2('Apartment Number');

$payer = new Payer();
$payer->setName('Shaoming', 'Lu')
    ->setEmailAddress('lusm@sz-bcs.com.cn')
    ->setPhone('18811111111')
    ->setAddress($address);

$order->setIntent('CAPTURE')->setPayer($payer);
foreach ($lineItems as $lineItem) {
    $item = new Item();
    $item->setSku($lineItem['productId'])->setName($lineItem['name'])
        ->setQuantity($lineItem['quantity'])
        ->setUnitAmount($lineItem['price'])
        ->setDescription('This is a test product. ID: '.$lineItem['productId']);

    $breakDown = new BreakDown();
    $breakDown->setItemTotal($itemTotal)
        ->setShipping($shippingTotal)
        ->setDiscount($discountTotal)
        ->setTaxTotal($taxTotal);
    $purchaseUnit = new PurchaseUnit();
    $purchaseUnit->setInvoiceId('WC-' . 100654)
        ->setItem($item)
        ->setDescription('This is a test order.')
        ->setAmount($total, $breakDown);

    $order->setPurchaseUnit($purchaseUnit);
    unset($item, $purchaseUnit);
}

$order->createOrder();


