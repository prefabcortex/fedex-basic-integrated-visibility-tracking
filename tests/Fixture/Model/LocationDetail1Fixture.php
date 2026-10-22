<?php

declare(strict_types=1);

namespace Prefabcortex\FedexBasicIntegratedVisibilityTracking\Tests\Fixture\Model;

use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\AddressVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactAndAddress1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\ContactVO1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail1;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Model\LocationDetail1LocationType;
use Prefabcortex\FedexBasicIntegratedVisibilityTracking\Validator\LocationDetail1Constraint;
use Symfony\Component\Validator\Constraint;

final class LocationDetail1Fixture
{
    public static function build(): LocationDetail1
    {
        $contact = ContactVO1::builder()
            ->setPersonName('John Taylor')
            ->setPhoneNumber('1234567890')
            ->setCompanyName('Fedex')
            ->build();
        $address = AddressVO1::builder(
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
        $locationContactAndAddress = ContactAndAddress1::builder(
            // contact
            $contact,
            // address
            $address,
        )->build();

        return LocationDetail1::builder(
            // locationContactAndAddress
            $locationContactAndAddress,
            // locationType
            LocationDetail1LocationType::FEDEX_AUTHORIZED_SHIP_CENTER,
        )
            ->setLocationId('SEA')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): LocationDetail1 */
    public static function reader(): callable
    {
        return LocationDetail1::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return LocationDetail1Constraint::constraints();
    }
}
