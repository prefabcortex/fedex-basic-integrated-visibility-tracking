<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetailLocationType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocationDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class LocationDetailFixture
{
    public static function build(): LocationDetail
    {
        $contact = ContactVO::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
        $address = AddressVO::builder(
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
        $locationContactAndAddress = ContactAndAddress::builder(
            // contact
            $contact,
            // address
            $address,
        )->build();

        return LocationDetail::builder(
            // locationContactAndAddress
            $locationContactAndAddress,
            // locationType
            LocationDetailLocationType::FEDEX_AUTHORIZED_SHIP_CENTER,
        )
            ->setLocationId('SEA')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): LocationDetail */
    public static function reader(): callable
    {
        return LocationDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return LocationDetailConstraint::constraints();
    }
}
