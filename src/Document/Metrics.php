<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\Document
 */
class Metrics
{
    /**
     * @MongoDB\Id(type="int", strategy="increment")
     */
    protected $_id;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $spend;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $clicks;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $impressions;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $created_at;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $accountId;


    public function setSpend($spend)
    {
        $this->spend = $spend;
    }

    public function getSpend()
    {
        return $this->spend;
    }

    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
    }

    public function getClicks()
    {
        return $this->clicks;
    }

    public function setImpressions($impressions)
    {
        $this->impressions = $impressions;
    }

    public function getImpressions()
    {
        return $this->impressions;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

}