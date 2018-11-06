<?php
namespace Omnipay\Paystack\Messages;

use Omnipay\Common\Exception\InvalidRequestException;

class PurchaseRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $this->validate('amount', 'email');

        return [
            'amount'       => $this->toAmount($this->getAmount()),
            'email'        => $this->getParameter('email'),
            'reference'    => $this->getTransactionReference(),
            'callback_url' => $this->getReturnUrl(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        try {
            $response = $this->getPaystack()->transaction->initialize($data);
        } catch (\Exception $e) {
            throw new InvalidRequestException($e->getMessage(), $e->getCode(), $e);
        }

        return $this->response = new PurchaseResponse($this, $response->data);
    }

    /**
     * Sets the email parameter.
     *
     * @param  string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setParameter('email', $email);
    }
}
