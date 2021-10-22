<?php
namespace Echolove\PayPal\Core;

use Echolove\PayPal\Abstracts\PayPalAbstract;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 15:54
 */
class BillingAddress extends PayPalAbstract
{
    /**
     * 地址的第一行。例如，号码或街道。例如，173 Drury Lane。 数据输入、合规性和风险检查所必需的。必须包含完整地址。
     * @param string $line1
     * @return BillingAddress
     */
    public function setAddressLine1(string $line1): BillingAddress
    {
        $this->data['address_line_1'] = $line1;
        return $this;
    }

    /**
     * 地址的第二行。 例如，套房或公寓号。
     * @param string $line2
     * @return BillingAddress
     */
    public function setAddressLine2(string $line2): BillingAddress
    {
        $this->data['address_line_2'] = $line2;
        return $this;
    }

    /**
     * 地址的第三行（如果需要）。 例如，巴西的街道补充、方向文本（例如沃尔玛旁边）或印度地址中的地标。
     * @param string $line3
     * @return BillingAddress
     */
    public function setAddressLine3(string $line3): BillingAddress
    {
        $this->data['address_line_3'] = $line3;
        return $this;
    }

    /**
     * 标识国家或地区的两字符 ISO 3166-1 代码。
     * @param string $countryCode
     * @return BillingAddress
     * @see https://developer.paypal.com/docs/integration/direct/rest/country-codes/
     */
    public function setCountryCode(string $countryCode): BillingAddress
    {
        $this->data['country_code'] = $countryCode;
        return $this;
    }

    /**
     * 邮政编码，即邮政编码或等效的编码。通常需要具有邮政编码或等效代码的国家/地区。
     * @param string $postalCode
     * @return BillingAddress
     * @see https://en.wikipedia.org/wiki/Postal_code
     */
    public function setPostalCode(string $postalCode): BillingAddress
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
     * @return BillingAddress
     */
    public function setAdminArea1(string $adminArea1): BillingAddress
    {
        $this->data['admin_area_1'] = $adminArea1;
        return $this;
    }

    /**
     * 一个城市、城镇或村庄。
     * @param string $adminArea2
     * @return BillingAddress
     */
    public function setAdminArea2(string $adminArea2): BillingAddress
    {
        $this->data['admin_area_2'] = $adminArea2;
        return $this;
    }

    /**
     * 子地区、郊区、邻里或地区。
     *
     * Brazil. Suburb, bairro, or neighborhood.
     *
     * India. Sub-locality or district. Street name information is not always available but a sub-locality or district can be a very small area.
     *
     * @param string $adminArea3
     * @return BillingAddress
     */
    public function setAdminArea3(string $adminArea3): BillingAddress
    {
        $this->data['admin_area_3'] = $adminArea3;
        return $this;
    }

    /**
     * 邻里、病房或区。
     *
     * The postal sorting code for Guernsey and many French territories, such as French Guiana.
     *
     * The fine-grained administrative levels in China.
     *
     * @param string $adminArea4
     * @return BillingAddress
     */
    public function setAdminArea4(string $adminArea4): BillingAddress
    {
        $this->data['admin_area_4'] = $adminArea4;
        return $this;
    }
}