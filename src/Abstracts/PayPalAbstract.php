<?php
namespace Echolove\PayPal\Abstracts;

/**
 * Created by PhpStorm.
 * User: 10127
 * Date: 2021/10/20
 * Time: 16:56
 */
class PayPalAbstract
{
    protected $data = [];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}