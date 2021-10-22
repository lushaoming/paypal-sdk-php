<?php
namespace Echolove\PayPal\Core;
use Echolove\PayPal\Abstracts\PayPalAbstract;
use Echolove\PayPal\Common\Utils;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 17:13
 */
class Item extends PayPalAbstract
{
    /**
     * 项目名称或标题
     * @param string $name
     * @return Item
     */
    public function setName(string $name): Item
    {
        $this->data['name'] = $name;
        return $this;
    }

    /**
     * 每单位的商品价格或费率
     * @param string $amount
     * @return Item
     */
    public function setUnitAmount(string $amount): Item
    {
        $this->data['unit_amount'] = Utils::priceFormat($amount);
        return $this;
    }

    /**
     * 每个单位的项目税
     * @param string $tax
     * @return Item
     */
    public function setTax(string $tax): Item
    {
        $this->data['tax'] = Utils::priceFormat($tax);
        return $this;
    }

    /**
     * 物品数量。 必须是整数。
     * @param int $quantity
     * @return Item
     */
    public function setQuantity(int $quantity): Item
    {
        $this->data['quantity'] = $quantity;
        return $this;
    }

    /**
     * 详细的项目描述
     * @param string $description
     * @return Item
     */
    public function setDescription(string $description): Item
    {
        $this->data['description'] = $description;
        return $this;
    }

    /**
     *
     * 物料的库存单位 (SKU)
     * @param string $sku
     * @return Item
     */
    public function setSku(string $sku): Item
    {
        $this->data['sku'] = $sku;
        return $this;
    }

    /**
     * 项目类别类型。
     *
     * DIGITAL_GOODS - DIGITAL_GOODS。 以电子格式存储、交付和使用的货物。 使用 [PayPal for Commerce Platform](https://www.paypal.com/us/webapps/mpp/commerce-platform) 产品的 API 调用方当前不支持此值。
     *
     * PHYSICAL_GOODS - 可以随交货证明一起运输的有形物品
     *
     * DONATION - 不交换任何商品或服务的捐赠或礼物，通常提供给非营利组织
     * @param string $category
     * @return Item
     */
    public function setCategory(string $category): Item
    {
        $this->data['category'] = $category;
        return $this;
    }
}