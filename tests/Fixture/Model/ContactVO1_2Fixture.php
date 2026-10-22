<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactVO1_2Constraint;
use Symfony\Component\Validator\Constraint;

final class ContactVO1_2Fixture
{
    public static function build(): ContactVO1_2
    {
        return ContactVO1_2::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ContactVO1_2 */
    public static function reader(): callable
    {
        return ContactVO1_2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ContactVO1_2Constraint::constraints();
    }
}
