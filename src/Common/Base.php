<?php
namespace Echolove\PayPal\Common;

use Echolove\PayPal\Abstracts\PayPalAbstract;
use Echolove\PayPal\Core\Currency;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/19
 * Time: 11:27
 */
class Base extends PayPalAbstract
{
    protected $clientId = '';
    protected $clientSecret = '';
    protected $production = true;
    protected $errorCode = 0;
    protected $errorMsg = '';

    public function __construct(string $clientId, string $clientSecret, array $config = [])
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        Configuration::setConfig($config);
    }

    public function setProduction(bool $production = true)
    {
        $this->production = $production;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     */
    protected function setErrorCode(int $errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMsg(): string
    {
        return $this->errorMsg;
    }

    /**
     * @param string $errorMsg
     */
    protected function setErrorMsg(string $errorMsg): void
    {
        $this->errorMsg = $errorMsg;
    }

    /**
     * 设置订单货币，只能设置一次，全局有效
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        Currency::setCurrency($currency);
    }
}