<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Alert;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\SPODResponseVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\SPODResponseVOConstraint;
use Symfony\Component\Validator\Constraint;

final class SPODResponseVOFixture
{
    public static function build(): SPODResponseVO
    {
        $alert = Alert::builder()->build();

        return SPODResponseVO::builder()
            ->setDocumentFormat('PNG')
            ->setAlerts([$alert])
            ->build();
    }

    /** @return callable(array<int|string, mixed>): SPODResponseVO */
    public static function reader(): callable
    {
        return SPODResponseVO::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return SPODResponseVOConstraint::constraints();
    }
}
