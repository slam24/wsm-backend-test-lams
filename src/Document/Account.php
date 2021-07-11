<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\Document(collection="Accounts")
 */
class Account
{
    /**
     * @MongoDB\Id(type="int", strategy="increment")
     */
    protected $_id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $accountId;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $externalAccountId;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $currencyCode;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $status;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $type;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $accountName;

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    public function getExternalAccountId()
    {
        return $this->externalAccountId;
    }

    public function setExternalAccountId($externalAccountId)
    {
        $this->externalAccountId = $externalAccountId;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getAccountName()
    {
        return $this->accountName;
    }

    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
    }
}