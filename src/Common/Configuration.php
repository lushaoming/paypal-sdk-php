<?php
namespace Echolove\PayPal\Common;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/19
 * Time: 11:55
 */
class Configuration
{
    const SDK_NAME = 'PayPal-PHP-SDK';
    const SDK_VERSION = '1.14.0';
    protected static $config = null;

    public static function setConfig(array $config)
    {
        if (self::$config === null) {
            self::$config = Utils::getDefaultConfig();
            foreach ($config as $key => $value) {
                self::$config[$key] = $value;
            }
        }
    }

    public static function getConfig(string $key)
    {
        return self::$config[$key] ?? null;
    }
}