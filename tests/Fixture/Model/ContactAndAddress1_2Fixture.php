<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\ContactAndAddress1_2Constraint;
use Symfony\Component\Validator\Constraint;

final class ContactAndAddress1_2Fixture
{
    public static function build(): ContactAndAddress1_2
    {
        return ContactAndAddress1_2::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): ContactAndAddress1_2 */
    public static function reader(): callable
    {
        return ContactAndAddress1_2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ContactAndAddress1_2Constraint::constraints();
    }
}
