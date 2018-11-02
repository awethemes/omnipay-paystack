<?php

namespace Omnipay\Paystack;

use Omnipay\Common\AbstractGateway;
use Omnipay\Paystack\Messages\PurchaseRequest;
use Omnipay\Paystack\Messages\CompletePurchaseRequest;

class Gateway extends AbstractGateway
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Paystack';
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultParameters()
    {
        return [
            'publicKey' => '',
            'secretKey' => '',
        ];
    }

    /**
     * Return the public key.
     *
     * @return string
     */
    public function getPublicKey()
    {
        return $this->getParameter('publicKey');
    }

    /**
     * Set the public key.
     *
     * @param  string $apiKey
     * @return $this
     */
    public function setPublicKey($key)
    {
        return $this->setParameter('publicKey', $key);
    }

    /**
     * Return the secret key.
     *
     * @return string
     */
    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    /**
     * Set the secret key.
     *
     * @param  string $key
     * @return $this
     */
    public function setSecretKey($key)
    {
        return $this->setParameter('secretKey', $key);
    }

    /**
     * {@inheritdoc}
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }
}
