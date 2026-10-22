<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactVOConstraint;
use Symfony\Component\Validator\Constraint;

final class ContactVOFixture
{
    public static function build(): ContactVO
    {
        return ContactVO::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ContactVO */
    public static function reader(): callable
    {
        return ContactVO::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ContactVOConstraint::constraints();
    }
}
