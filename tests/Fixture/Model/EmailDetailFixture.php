<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\EmailDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\EmailDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class EmailDetailFixture
{
    public static function build(): EmailDetail
    {
        return EmailDetail::builder('p1@fedex.com')
            ->setName('Preethi')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): EmailDetail */
    public static function reader(): callable
    {
        return EmailDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return EmailDetailConstraint::constraints();
    }
}
