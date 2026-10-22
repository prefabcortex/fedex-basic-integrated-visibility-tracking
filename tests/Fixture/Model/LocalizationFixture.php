<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\Localization;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocalizationConstraint;
use Symfony\Component\Validator\Constraint;

final class LocalizationFixture
{
    public static function build(): Localization
    {
        return Localization::builder('en')
            ->setLocaleCode('US')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Localization */
    public static function reader(): callable
    {
        return Localization::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return LocalizationConstraint::constraints();
    }
}
