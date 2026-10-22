<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AddressVO1Constraint;
use Symfony\Component\Validator\Constraint;

final class AddressVO1Fixture
{
    public static function build(): AddressVO1
    {
        return AddressVO1::builder(
            // streetLines
            ['1043 North Easy Street', 'Suite 999'],
            // countryCode
            'US',
        )
            ->setClassification('BUSINESS')
            ->setResidential(false)
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): AddressVO1 */
    public static function reader(): callable
    {
        return AddressVO1::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return AddressVO1Constraint::constraints();
    }
}
