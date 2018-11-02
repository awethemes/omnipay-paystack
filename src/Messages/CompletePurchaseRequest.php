<?php

namespace Omnipay\Paystack\Messages;

use Omnipay\Common\Exception\InvalidRequestException;

class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $reference =  $this->getTransactionReference() ?: $this->httpRequest->get('reference');

        if (! $reference) {
            throw new InvalidRequestException('The reference parameter is required');
        }

        return ['reference' => $reference];
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        try {
            $response = $this->getPaystack()->transaction->verify($data);
        } catch (\Exception $e) {
            throw new InvalidRequestException($e->getMessage(), $e->getCode(), $e);
        }

        return $this->response = new CompletePurchaseResponse($this, $response->data);
    }
}
