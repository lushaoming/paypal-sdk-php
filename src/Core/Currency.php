<?php
namespace Echolove\PayPal\Core;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 16:41
 */
class Currency
{
    /**
     * @param string $currency
     */
    public static function setCurrency(string $currency)
    {
        if (!defined('PAYPAL_CURRENCY')) {
            define('PAYPAL_CURRENCY', $currency);
        }
    }

    /**
     * @return string
     */
    public static function getCurrency(): string
    {
        if (!defined('PAYPAL_CURRENCY')) {
            return 'USD';
        }

        return PAYPAL_CURRENCY;
    }
}