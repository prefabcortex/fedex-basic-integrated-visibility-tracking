<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Parameter;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ParameterConstraint;
use Symfony\Component\Validator\Constraint;

final class ParameterFixture
{
    public static function build(): Parameter
    {
        return Parameter::builder()
            ->setValue('value')
            ->setKey('key')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Parameter */
    public static function reader(): callable
    {
        return Parameter::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ParameterConstraint::constraints();
    }
}
