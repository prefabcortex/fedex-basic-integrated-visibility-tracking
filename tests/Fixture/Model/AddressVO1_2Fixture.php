<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO1_2;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\AddressVO1_2Constraint;
use Symfony\Component\Validator\Constraint;

final class AddressVO1_2Fixture
{
    public static function build(): AddressVO1_2
    {
        return AddressVO1_2::builder()
            ->setAddressClassification('BUSINESS')
            ->setResidential(false)
            ->setStreetLines(['1043 North Easy Street', 'Suite 999'])
            ->setCity('SEATTLE')
            ->setStateOrProvinceCode('WA')
            ->setPostalCode('98101')
            ->setCountryCode('US')
            ->setCountryName('United States')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): AddressVO1_2 */
    public static function reader(): callable
    {
        return AddressVO1_2::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return AddressVO1_2Constraint::constraints();
    }
}
