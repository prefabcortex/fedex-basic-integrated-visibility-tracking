<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\TCNInfo;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\TCNInfoConstraint;
use Symfony\Component\Validator\Constraint;

final class TCNInfoFixture
{
    public static function build(): TCNInfo
    {
        return TCNInfo::builder('N552428361Y555XXX')
            ->setCarrierCode('FDXE')
            ->setShipDateBegin('2020-03-29')
            ->setShipDateEnd('2020-04-01')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TCNInfo */
    public static function reader(): callable
    {
        return TCNInfo::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TCNInfoConstraint::constraints();
    }
}
