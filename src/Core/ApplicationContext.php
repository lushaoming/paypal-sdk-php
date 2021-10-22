<?php
namespace Echolove\PayPal\Core;

use Echolove\PayPal\Abstracts\PayPalAbstract;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 16:10
 */
class ApplicationContext extends PayPalAbstract
{
    /**
     * 覆盖 PayPal 网站上 PayPal 帐户中的企业名称的标签。
     * @param string $brandName
     */
    public function setBrandName(string $brandName)
    {
        $this->data['brand_name'] = $brandName;
    }

    /**
     * PayPal 支付体验显示的页面的 BCP 47-formatted 区域设置。支持五字符代码。 例如，da-DK、he-IL、id-ID、ja-JP、no-NO、pt-BR、ru-RU、sv-SE、th-TH、zh-CN、zh-HK 或 zh-TW。
     * @param string $locale
     */
    public function setLocale(string $locale)
    {
        $this->data['locale'] = $locale;
    }

    /**
     *在 PayPal 网站上显示的用于客户结账的登陆页面的类型。可能值为：
     *
     * LOGIN - 当客户单击 PayPal Checkout 时，客户将被重定向到一个页面以登录 PayPal 并批准付款。
     *
     * BILLING - 当客户单击 PayPal Checkout 时，客户将被重定向到一个页面，以输入完成购买所需的信用卡或借记卡以及其他相关账单信息。
     *
     * NO_PREFERENCE - 当客户单击 PayPal Checkout 时，客户将被重定向到登录 PayPal 并批准付款的页面或输入信用卡或借记卡以及完成购买所需的其他相关账单信息的页面，具体取决于他们与PayPal之前的交互。
     *
     * @param string $landingPage
     */
    public function setLandingPage(string $landingPage)
    {
        $this->data['landing_page'] = $landingPage;
    }

    /**
     * 运输偏好，可能值为：
     *
     * GET_FROM_FILE - 使用客户在 PayPal 网站上提供的送货地址。
     *
     * NO_SHIPPING - 无 PayPal 送货地址。推荐用于数字商品。
     *
     * SET_PROVIDED_ADDRESS - 使用商家提供的地址。客户无法在 PayPal 网站上更改此地址。
     *
     * @param string $shippingPreference
     */
    public function setShippingPreference(string $shippingPreference)
    {
        $this->data['shipping_preference'] = $shippingPreference;
    }

    /**
     * 配置继续或立即付款结帐流程。
     *
     * CONTINUE - 在您将客户重定向到 PayPal 付款页面后，会出现一个继续按钮。当结帐流程启动时最终金额未知，并且您希望将客户重定向到商家页面而不处理付款时，请使用此选项。
     *
     * PAY_NOW - 在您将客户重定向到 PayPal 付款页面后，会出现“立即付款”按钮。如果在开始结帐时知道最终金额并且您希望在客户单击“立即付款”时立即处理付款，请使用此选项。
     *
     * @param string $userAction
     */
    public function setUserAction(string $userAction)
    {
        $this->data['user_action'] = $userAction;
    }

    public function setReturnUrl(string $url)
    {
        $this->data['return_url'] = $url;
    }

    public function setCancelUrl(string $url)
    {
        $this->data['cancel_url'] = $url;
    }
}