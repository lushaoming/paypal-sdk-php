<?php
namespace Echolove\PayPal\Core;

use Echolove\PayPal\Abstracts\PayPalAbstract;
use Echolove\PayPal\Common\Utils;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 16:36
 */
class BreakDown extends PayPalAbstract
{

    /**
     * 所有项目的小计
     * @param string $amount
     * @return BreakDown
     */
    public function setItemTotal(string $amount): BreakDown
    {
        $this->data['item_total'] = Utils::priceFormat($amount);
        return $this;
    }

    /**
     * 所有商品的运费
     * @param string $amount
     * @return BreakDown
     */
    public function setShipping(string $amount): BreakDown
    {
        $this->data['shipping'] = Utils::priceFormat($amount);
        return $this;
    }

    /**
     * 所有物品的手续费
     * @param string $amount
     * @return BreakDown
     */
    public function setHandling(string $amount): BreakDown
    {
        $this->data['handling'] = Utils::priceFormat($amount);
        return $this;
    }

    /**
     * 所有项目的总税额
     * @param string $amount
     * @return BreakDown
     */
    public function setTaxTotal(string $amount): BreakDown
    {
        $this->data['tax_total'] = Utils::priceFormat($amount);
        return $this;
    }

    /**
     * 所有项目的保险费
     * @param string $amount
     * @return BreakDown
     */
    public function setInsurance(string $amount): BreakDown
    {
        $this->data['insurance'] = Utils::priceFormat($amount);
        return $this;
    }

    /**
     * 所有商品的运费折扣
     * @param string $amount
     * @return BreakDown
     */
    public function setShippingDiscount(string $amount): BreakDown
    {
        $this->data['shipping_discount'] = Utils::priceFormat($amount);
        return $this;
    }

    /**
     * 所有商品的折扣
     * @param string $amount
     * @return BreakDown
     */
    public function setDiscount(string $amount): BreakDown
    {
        $this->data['discount'] = Utils::priceFormat($amount);
        return $this;
    }
}