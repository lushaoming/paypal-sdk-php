<?php
namespace Echolove\PayPal\Core;

use Echolove\PayPal\Abstracts\PayPalAbstract;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 15:46
 */
class Payer extends PayPalAbstract
{
    /**
     * The email address of the payer.
     * @param string $email
     * @return Payer
     */
    public function setEmailAddress(string $email): Payer
    {
        $this->data['email_address'] = $email;
        return $this;
    }

    /**
     * The PayPal-assigned ID for the payer.
     * @param string $payerId
     * @return Payer
     */
    public function setPayerId(string $payerId): Payer
    {
        $this->data['payer_id'] = $payerId;
        return $this;
    }

    /**
     * The name of the payer. Supports only the given_name and surname properties.
     * @param string $firstName
     * @param string $lastName
     * @return Payer
     */
    public function setName(string $firstName, string $lastName): Payer
    {
        $this->data['name'] = [
            'given_name' => $firstName,
            'surname' => $lastName
        ];
        return $this;
    }

    /**
     * The phone number of the customer.
     *
     * Pattern: ^[0-9]{1,14}?$
     * @param string $phoneNumber
     * @param string $phoneType
     * @return Payer
     */
    public function setPhone(string $phoneNumber, string $phoneType = 'OTHER'): Payer
    {
        $this->data['phone'] = [
            'phone_type' => $phoneType,
            'phone_number' => [
                'national_number' => $phoneNumber
            ]
        ];
        return $this;
    }

    /**
     * @param BillingAddress $address
     * @return $this
     */
    public function setAddress(BillingAddress $address): Payer
    {
        $this->data['address'] = $address;
        return $this;
    }
}