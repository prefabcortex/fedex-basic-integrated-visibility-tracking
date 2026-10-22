<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AddressVOConstraint;
use Symfony\Component\Validator\Constraint;

final class AddressVOFixture
{
    public static function build(): AddressVO
    {
        return AddressVO::builder(
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
            ->setCountryName('United States')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): AddressVO */
    public static function reader(): callable
    {
        return AddressVO::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return AddressVOConstraint::constraints();
    }
}
