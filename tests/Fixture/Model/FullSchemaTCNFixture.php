<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\FullSchemaTCN;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TCNInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\FullSchemaTCNConstraint;
use Symfony\Component\Validator\Constraint;

final class FullSchemaTCNFixture
{
    public static function build(): FullSchemaTCN
    {
        $tcnInfo = TCNInfo::builder('N552428361Y555XXX')
            ->setCarrierCode('FDXE')
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();

        return FullSchemaTCN::builder($tcnInfo)
            ->setIncludeDetailedScans(true)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): FullSchemaTCN */
    public static function reader(): callable
    {
        return FullSchemaTCN::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return FullSchemaTCNConstraint::constraints();
    }
}
