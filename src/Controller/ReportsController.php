<?php
// src/Controller/ReportsController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Document\Account;
use App\Document\Metrics;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Request;

class ReportsController extends AbstractController
{
    /**
     * @Route("/", name="reports")
     */
    public function index(DocumentManager $dm, Request $request)
    {
        $builder = $dm->createAggregationBuilder(Account::class);
        $builder
            ->lookup('Metrics')
            ->localField('_id')
            ->foreignField('accountId')
            ->alias('metrics')
            ->unwind('$metrics')
                ->preserveNullAndEmptyArrays(true)
            ->match()
                ->field('status')->equals('ACTIVE')
            ->group()
                ->field('_id')
                ->expression('$_id')
                ->field('accountName')
                ->first('$accountName')
                ->field('accountId')
                ->first('$accountId')
                ->field('spend')
                ->sum('$metrics.spend')
                ->field('clicks')
                ->sum('$metrics.clicks')
                ->field('impressions')
                ->sum('$metrics.impressions')
            ->addFields()
                ->field('costPerClick')
                    ->cond(
                        $builder->expr()->eq('$clicks', 0),
                        0,
                        ['$divide' => ['$spend', '$clicks' ] ]
                    )
            ->sort(['_id' => 1]);

        $aggregation = $builder->getAggregation();
        $aggregation->getIterator()->toArray();

        return $this->render('index.html.twig', [
            'title' => "wsm-backend-test-lams",
            'message' => "Hello, ReportsController",
            'accounts' => $aggregation
        ]);
    }

    /**
     * @Route("/{accountId}", name="showreport")
     */
    public function show($accountId, DocumentManager $dm, Request $request)
    {
        $builder = $dm->createAggregationBuilder(Account::class);
        $builder
            ->lookup('Metrics')
            ->localField('_id')
            ->foreignField('accountId')
            ->alias('metrics')
            ->unwind('$metrics')
                ->preserveNullAndEmptyArrays(true)
            ->match()
                ->field('status')->equals('ACTIVE')
                ->field('accountId')->equals($accountId)
            ->group()
                ->field('_id')
                ->expression('$_id')
                ->field('accountName')
                ->first('$accountName')
                ->field('accountId')
                ->first('$accountId')
                ->field('spend')
                ->sum('$metrics.spend')
                ->field('clicks')
                ->sum('$metrics.clicks')
                ->field('impressions')
                ->sum('$metrics.impressions')
            ->addFields()
                    ->field('costPerClick')
                        ->cond(
                            $builder->expr()->eq('$clicks', 0),
                            0,
                            ['$divide' => ['$spend', '$clicks' ] ]
                        )
            ->sort(['_id' => -1]);

        $aggregation = $builder->getAggregation();
        $aggregation->getIterator()->toArray();

        return $this->render('index.html.twig', [
            'title' => "wsm-backend-test-lams",
            'message' => "Hello, ReportsController",
            'accounts' => $aggregation,
            'accountId' => $accountId
        ]);
    }
}
