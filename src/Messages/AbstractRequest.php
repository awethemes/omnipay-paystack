<?php

namespace Omnipay\Paystack\Messages;

use Yabacon\Paystack;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * Store the paystack instance.
     *
     * @var \Yabacon\Paystack
     */
    protected $paystack;

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
     * Return the new instance Paystack.
     *
     * @return \Yabacon\Paystack
     */
    protected function getPaystack()
    {
        if (! $this->paystack) {
            $this->paystack = new Paystack($this->getParameter('secretKey'));
            $this->paystack->useGuzzle();
        }

        return $this->paystack;
    }
}
