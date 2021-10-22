<?php
namespace Echolove\PayPal\Common;

use Echolove\PayPal\Core\Currency;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/19
 * Time: 11:32
 */
class Utils
{
    /**
     * Get Default configs
     * @return array
     */
    public static function getDefaultConfig()
    {
        return [
            'mode' => 'live', // sandbox / live
            'log.LogEnabled' => 1, // 1 / 0
            'log.FileName' => __DIR__.'/PayPal.log',
            'log.LogLevel' => 'INFO', // Sandbox Environments: DEBUG, INFO, WARN, ERROR; Live Environments: INFO, WARN, ERROR
            'validation.level' => 'disable',
            'cache.enabled' => 1, // 1 / 0
            'cache.FileName' => __DIR__.'/auth.cache'
        ];
    }

    public static function getPHPBit()
    {
        switch (PHP_INT_SIZE) {
            case 4:
                return '32';
            case 8:
                return '64';
            default:
                return PHP_INT_SIZE;
        }
    }

    /**
     * Get user agent
     * @param $sdkName
     * @param $sdkVersion
     * @return string
     */
    public static function getUserAgent($sdkName, $sdkVersion)
    {
        $featureList = array(
            'platform-ver=' . PHP_VERSION,
            'bit=' . self::getPHPBit(),
            'os=' . str_replace(' ', '_', php_uname('s') . ' ' . php_uname('r')),
            'machine=' . php_uname('m')
        );
        if (defined('OPENSSL_VERSION_TEXT')) {
            $opensslVersion = explode(' ', OPENSSL_VERSION_TEXT);
            $featureList[] = 'crypto-lib-ver=' . $opensslVersion[1];
        }
        if (function_exists('curl_version')) {
            $curlVersion = curl_version();
            $featureList[] = 'curl=' . $curlVersion['version'];
        }
        return sprintf("PayPalSDK/%s %s (%s)", $sdkName, $sdkVersion, implode('; ', $featureList));
    }

    /**
     * @return string
     */
    public static function getApiDomain(): string
    {
        if (Configuration::getConfig('mode') === 'sandbox') {
            return 'https://api.sandbox.paypal.com';
        }

        return 'https://api.paypal.com';
    }

    /**
     * Json to array
     * @param $data
     * @return array|mixed
     */
    public static function toArray($data)
    {
        if (!$data) return [];
        return json_decode($data, true);
    }

    /**
     * Array or object to json
     * @param $data
     * @param int $options
     * @return mixed|string
     */
    public static function toJSON($data, int $options = 0)
    {
        // Because of PHP Version 5.3, we cannot use JSON_UNESCAPED_SLASHES option
        // Instead we would use the str_replace command for now.
        // TODO: Replace this code with return json_encode($data, $options | 64); once we support PHP >= 5.4
        if (version_compare(phpversion(), '5.4.0', '>=') === true) {
            return json_encode($data, $options | 64);
        }
        return str_replace('\\/', '/', json_encode($data, $options));
    }

    public static function priceFormat(string $amount)
    {
        return [
            'currency_code' => Currency::getCurrency(),
            'value' => $amount
        ];
    }
}