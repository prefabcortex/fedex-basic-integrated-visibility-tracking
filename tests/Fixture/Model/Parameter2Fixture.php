<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Parameter2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\Parameter2Constraint;
use Symfony\Component\Validator\Constraint;

final class Parameter2Fixture
{
    public static function build(): Parameter2
    {
        return Parameter2::builder()
            ->setValue('value')
            ->setKey('key')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Parameter2 */
    public static function reader(): callable
    {
        return Parameter2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return Parameter2Constraint::constraints();
    }
}
