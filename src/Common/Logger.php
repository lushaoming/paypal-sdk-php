<?php
namespace Echolove\PayPal\Common;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/19
 * Time: 11:36
 */
class Logger
{
    private static function writeLog($level, $text)
    {
        if (!Configuration::getConfig('log.LogEnabled')) {
            return;
        }
        $logFile = Configuration::getConfig('log.FileName');
        $datetime = date('Y-m-d H:i:s');

        file_put_contents($logFile, <<<LOG
[{$datetime}][{$level}] {$text} 
LOG
);
    }

    public static function writeInfo($text)
    {
        self::writeLog('info', $text);
    }

    public static function writeError($text)
    {
        self::writeLog('error', $text);
    }
}