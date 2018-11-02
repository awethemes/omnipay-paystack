<?php

namespace Omnipay\Paystack\Messages;

class CompletePurchaseResponse extends \Omnipay\Common\Message\AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function isSuccessful()
    {
        return 'success' === $this->getCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionId()
    {
        return $this->data->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionReference()
    {
        return $this->data->reference;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        return $this->data->status;
    }
}
