<?php
namespace Echolove\PayPal\Core;

use Echolove\PayPal\Abstracts\PayPalAbstract;
use Echolove\PayPal\Common\Utils;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 16:26
 */
class PurchaseUnit extends PayPalAbstract
{
    /**
     * API 调用方为购买单位提供的外部 ID。当您必须通过 PATCH 更新订单时，需要多个采购单位。
     *
     * 如果您省略此值且订单仅包含一个购买单位，则 PayPal 会将此值设置为默认值。
     *
     * @param string $referenceId
     * @return $this;
     */
    public function setReferenceId(string $referenceId): PurchaseUnit
    {
        $this->data['reference_id'] = $referenceId;
        return $this;
    }

    /**
     * @param string $amount
     * @param BreakDown $breakdown
     * @return $this;
     */
    public function setAmount(string $amount, BreakDown $breakdown): PurchaseUnit
    {
        $this->data['amount'] = Utils::priceFormat($amount);
        $this->data['amount']['breakdown'] = $breakdown;
        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): PurchaseUnit
    {
        $this->data['description'] = $description;
        return $this;
    }

    /**
     * @param string $customId
     * @return $this
     */
    public function setCustomId(string $customId): PurchaseUnit
    {
        $this->data['custom_id'] = $customId;
        return $this;
    }

    /**
     * @param string $invoiceId
     * @return $this
     */
    public function setInvoiceId(string $invoiceId): PurchaseUnit
    {
        $this->data['invoice_id'] = $invoiceId;
        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function setItem(Item $item): PurchaseUnit
    {
        $this->data['items'][] = $item;
        return $this;
    }
}