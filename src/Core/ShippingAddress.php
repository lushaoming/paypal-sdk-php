<?php
namespace Echolove\PayPal\Core;
use Echolove\PayPal\Abstracts\PayPalAbstract;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 17:09
 */
class ShippingAddress extends PayPalAbstract
{
    /**
     * 将物品运送到的人的姓名
     * @param string $name
     * @return ShippingAddress
     */
    public function setName(string $name): ShippingAddress
    {
        $this->data['full_name'] = $name;
        return $this;
    }

    /**
     * 付款人希望从收款人那里取货的方法，例如运输、亲自取货。可能存在类型或选项，但不能同时存在。
     *
     * SHIPPING - 付款人打算在指定地址接收物品
     *
     * PICKUP_IN_PERSON - 付款人拟亲自到收款人处领取物品
     *
     * @param string $type
     * @return ShippingAddress
     */
    public function setType(string $type): ShippingAddress
    {
        $this->data['type'] = $type;
        return $this;
    }

    /**
     * 地址的第一行。例如，号码或街道。例如，173 Drury Lane。 数据输入、合规性和风险检查所必需的。必须包含完整地址。
     * @param string $line1
     * @return ShippingAddress
     */
    public function setAddressLine1(string $line1): ShippingAddress
    {
        $this->data['address_line_1'] = $line1;
        return $this;
    }

    /**
     * 地址的第二行。 例如，套房或公寓号。
     * @param string $line2
     * @return ShippingAddress
     */
    public function setAddressLine2(string $line2): ShippingAddress
    {
        $this->data['address_line_2'] = $line2;
        return $this;
    }

    /**
     * 标识国家或地区的两字符 ISO 3166-1 代码。
     * @param string $countryCode
     * @return ShippingAddress
     * @see https://developer.paypal.com/docs/integration/direct/rest/country-codes/
     */
    public function setCountryCode(string $countryCode): ShippingAddress
    {
        $this->data['country_code'] = $countryCode;
        return $this;
    }

    /**
     * 邮政编码，即邮政编码或等效的编码。通常需要具有邮政编码或等效代码的国家/地区。
     * @param string $postalCode
     * @return ShippingAddress
     * @see https://en.wikipedia.org/wiki/Postal_code
     */
    public function setPostalCode(string $postalCode): ShippingAddress
    {
        $this->data['postal_code'] = $postalCode;
        return $this;
    }

    /**
     * 一个国家的最高级别细分，通常是省、州或 ISO-3166-2 细分。 邮政投递格式。 例如，使用 CA 而不是 California 。 按国家/地区划分的价值是：
     *
     * UK. A county.
     *
     * US. A state.
     *
     * Canada. A province.
     *
     * Japan. A prefecture.
     *
     * Switzerland. A kanton.
     *
     * @param string $adminArea1
     * @return ShippingAddress
     */
    public function setAdminArea1(string $adminArea1): ShippingAddress
    {
        $this->data['admin_area_1'] = $adminArea1;
        return $this;
    }

    /**
     * 一个城市、城镇或村庄。
     * @param string $adminArea2
     * @return ShippingAddress
     */
    public function setAdminArea2(string $adminArea2): ShippingAddress
    {
        $this->data['admin_area_2'] = $adminArea2;
        return $this;
    }
}