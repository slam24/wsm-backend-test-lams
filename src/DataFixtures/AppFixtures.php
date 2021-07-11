<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\Account;
use App\Document\Metrics;

class AppFixtures extends Fixture
{
    function __construct(DocumentManager $dm) {
        $this->dm = $dm;
    }

    public function load(ObjectManager $manager)
    {
        $accounts = array (
            array("accountId" => "googleAds2336217178", "externalAccountId" => "2336217178", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #1"),
            array("accountId" => "googleAds9721796053", "externalAccountId" => "9721796053", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #2"),
            array("accountId" => "googleAds7796843857", "externalAccountId" => "7796843857", "currencyCode" => "CAD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #3"),
            array("accountId" => "microsoftAds2244859755", "externalAccountId" => "2244859755", "currencyCode" => "GBP", "status" => "ACTIVE", "type" => "microsoftAds", "accountName" => "Test Account #4"),
            array("accountId" => "microsoftAds1420534743", "externalAccountId" => "1420534743", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "microsoftAds", "accountName" => "Test Account #5"),
            array("accountId" => "googleAds7603305180", "externalAccountId" => "7603305180", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #6"),
            array("accountId" => "googleAds1793398662", "externalAccountId" => "1793398662", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #7"),
            array("accountId" => "googleAds4340779985", "externalAccountId" => "4340779985", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #8"),
            array("accountId" => "microsoftAds6123944861", "externalAccountId" => "6123944861", "currencyCode" => "CAD", "status" => "ACTIVE", "type" => "microsoftAds", "accountName" => "Test Account #9"),
            array("accountId" => "microsoftAds2593756828", "externalAccountId" => "2593756828", "currencyCode" => "GBP", "status" => "ACTIVE", "type" => "microsoftAds", "accountName" => "Test Account #10"),
            array("accountId" => "googleAds3132626569", "externalAccountId" => "3132626569", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #11"),
            array("accountId" => "googleAds2412265619", "externalAccountId" => "2412265619", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #12"),
            array("accountId" => "googleAds7581141391", "externalAccountId" => "7581141391", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #13"),
            array("accountId" => "microsoftAds7317228306", "externalAccountId" => "7317228306", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "microsoftAds", "accountName" => "Test Account #14"),
            array("accountId" => "microsoftAds3397281304", "externalAccountId" => "3397281304", "currencyCode" => "CAD", "status" => "ACTIVE", "type" => "microsoftAds", "accountName" => "Test Account #15"),
            array("accountId" => "googleAds8049669976", "externalAccountId" => "8049669976", "currencyCode" => "GBP", "status" => "INACTIVE", "type" => "googleAds", "accountName" => "Test Account #16"),
            array("accountId" => "googleAds8986083175", "externalAccountId" => "8986083175", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #17"),
            array("accountId" => "googleAds4752708345", "externalAccountId" => "4752708345", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "googleAds", "accountName" => "Test Account #18"),
            array("accountId" => "microsoftAds6728705722", "externalAccountId" => "6728705722", "currencyCode" => "USD", "status" => "ACTIVE", "type" => "microsoftAds", "accountName" => "Test Account #19"),
            array("accountId" => "microsoftAds8063042303", "externalAccountId" => "8063042303", "currencyCode" => "USD", "status" => "INACTIVE", "type" => "microsoftAds", "accountName" => "Test Account #20")
        );


        $metrics = array (
            array("spend" => 100, "clicks" => 10, "impressions" => 1, "accountId" => 1, "created_at" => "2021-07-01"),
            array("spend" => 100, "clicks" => 10, "impressions" => 1, "accountId" => 1, "created_at" => "2021-07-01"),
            array("spend" => 100, "clicks" => 10, "impressions" => 1, "accountId" => 2, "created_at" => "2021-07-01")
        );

        foreach ($accounts as $key => $value) {
            $account = new Account();
            $account->setAccountId($value['accountId']);
            $account->setExternalAccountId($value['externalAccountId']);
            $account->setCurrencyCode($value['currencyCode']);
            $account->setStatus($value['status']);
            $account->setType($value['type']);
            $account->setAccountName($value['accountName']);

            $this->dm->persist($account);
            $this->dm->flush();
        }

        foreach ($metrics as $key => $value) {
            $m = new Metrics();
            $m->setSpend($value['spend']);
            $m->setClicks($value['clicks']);
            $m->setImpressions($value['impressions']);
            $m->setAccountId($value['accountId']);
            $m->setCreated_at($value['created_at']);

            $this->dm->persist($m);
            $this->dm->flush();
        }
    }
}
