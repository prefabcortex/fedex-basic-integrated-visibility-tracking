<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactVO1Constraint;
use Symfony\Component\Validator\Constraint;

final class ContactVO1Fixture
{
    public static function build(): ContactVO1
    {
        return ContactVO1::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ContactVO1 */
    public static function reader(): callable
    {
        return ContactVO1::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ContactVO1Constraint::constraints();
    }
}
