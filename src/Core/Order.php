<?php

namespace Echolove\PayPal\Core;

use Echolove\PayPal\Common\Base;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/19
 * Time: 11:27
 */
class Order extends Base
{
    /**
     * @param string $intent 在订单创建后立即获取付款或授权订单付款的意图
     *
     * CAPTURE: 商家打算在客户付款后立即获取付款
     *
     * AUTHORIZE: 商家打算在客户付款后授权付款并搁置资金
     * @return Order
     */
    public function setIntent(string $intent): Order
    {
        $this->data['intent'] = $intent;
        return $this;
    }

    /**
     * 批准并支付订单的客户。客户也称为付款人。
     * @param Payer $payer
     * @return Order
     */
    public function setPayer(Payer $payer): Order
    {
        $this->data['payer'] = $payer;
        return $this;
    }

    /**
     * 在使用 PayPal 付款的审批过程中自定义付款人体验。
     * @param ApplicationContext $applicationContext
     * @return Order
     */
    public function setApplicationContext(ApplicationContext $applicationContext): Order
    {
        $this->data['application_context'] = $applicationContext;
        return $this;
    }

    /**
     * @param PurchaseUnit $purchaseUnit
     * @return $this
     */
    public function setPurchaseUnit(PurchaseUnit $purchaseUnit): Order
    {
        $this->data['purchase_units'][] = $purchaseUnit;
        return $this;
    }

    public function createOrder()
    {
        var_dump($this->data);
    }
}