<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace AgenciaS3\Entities{
/**
 * Class City.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \AgenciaS3\Entities\State $state
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\City onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\City whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\City withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\City withoutTrashed()
 */
	class City extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class Client.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string|null $name
 * @property string|null $cpf
 * @property string|null $cnpj
 * @property string|null $state_registration
 * @property string|null $municipal_registration
 * @property string|null $corporate_name
 * @property string|null $fantasy_name
 * @property string|null $zip_code
 * @property int|null $state_id
 * @property int|null $city_id
 * @property string|null $address
 * @property string|null $district
 * @property string|null $number
 * @property string|null $complement
 * @property string|null $phone
 * @property string|null $cell_phone
 * @property string $email
 * @property int $type_client_id
 * @property int $segment_client_id
 * @property string|null $entry_date
 * @property string|null $description
 * @property string $active
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\ClientUser[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\ClientContact[] $contacts
 * @property-read int|null $contacts_count
 * @property-read \AgenciaS3\Entities\SegmentClient $segmentClient
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\ClientService[] $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\SocialMediaPost[] $socialMediaPosts
 * @property-read int|null $social_media_posts_count
 * @property-read \AgenciaS3\Entities\State|null $state
 * @property-read \AgenciaS3\Entities\TypeClient $typeClient
 * @property-read \AgenciaS3\Entities\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\ClientUser[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Client onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereCellPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereCnpj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereCorporateName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereEntryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereFantasyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereMunicipalRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereSegmentClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereStateRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereTypeClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Client whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Client withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Client withoutTrashed()
 */
	class Client extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class ClientContact.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property string $name
 * @property string|null $email
 * @property string|null $office
 * @property string|null $phone
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Client $client
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientContact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientContact whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientContact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientContact withoutTrashed()
 */
	class ClientContact extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class ClientDomain.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\ClientDomainText[] $texts
 * @property-read int|null $texts_count
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientDomain onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomain whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientDomain withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientDomain withoutTrashed()
 */
	class ClientDomain extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class ClientDomainText.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $client_domain_id
 * @property int $user_id
 * @property string $name
 * @property string|null $description
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\ClientDomain $clientDomain
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientDomainText onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereClientDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientDomainText whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientDomainText withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientDomainText withoutTrashed()
 */
	class ClientDomainText extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class ClientService.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $client_id
 * @property int $service_id
 * @property int $demand_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Client $client
 * @property-read \AgenciaS3\Entities\Demand $demand
 * @property-read \AgenciaS3\Entities\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService query()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService whereDemandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientService whereUpdatedAt($value)
 */
	class ClientService extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class ClientUser.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Client $client
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ClientUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientUser withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ClientUser withoutTrashed()
 */
	class ClientUser extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class Demand.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property string $unique
 * @property int|null $day
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\ClientService[] $services
 * @property-read int|null $services_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Demand onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand whereUnique($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Demand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Demand withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Demand withoutTrashed()
 */
	class Demand extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class Schedule.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\ScheduleUser[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Schedule onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Schedule whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Schedule withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Schedule withoutTrashed()
 */
	class Schedule extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class ScheduleUser.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $schedule_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Schedule $schedule
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ScheduleUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser whereScheduleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\ScheduleUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ScheduleUser withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\ScheduleUser withoutTrashed()
 */
	class ScheduleUser extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class Sector.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\UserSector[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Sector onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Sector whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Sector withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Sector withoutTrashed()
 */
	class Sector extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class SegmentClient.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\Client[] $clients
 * @property-read int|null $clients_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SegmentClient onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SegmentClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SegmentClient withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SegmentClient withoutTrashed()
 */
	class SegmentClient extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class Service.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $type_id
 * @property string $name
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\ClientService[] $services
 * @property-read int|null $services_count
 * @property-read \AgenciaS3\Entities\TypeService $type
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Service onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Service withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Service withoutTrashed()
 */
	class Service extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class SocialMediaPost.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property int $status_id
 * @property string $name
 * @property string $date
 * @property string|null $link_url
 * @property string|null $pit
 * @property string|null $deadline
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\SocialMediaPostService[] $services
 * @property-read int|null $services_count
 * @property-read \AgenciaS3\Entities\SocialMediaStatus $status
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaPost onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereLinkUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost wherePit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPost whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaPost withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaPost withoutTrashed()
 */
	class SocialMediaPost extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class SocialMediaPostService.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $post_id
 * @property int $service_id
 * @property float|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\SocialMediaPost $post
 * @property-read \AgenciaS3\Entities\Service $service
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaPostService onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaPostService whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaPostService withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaPostService withoutTrashed()
 */
	class SocialMediaPostService extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class SocialMediaStatus.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property string|null $color
 * @property string $active
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\SocialMediaPost[] $socialMediaPosts
 * @property-read int|null $social_media_posts_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\SocialMediaStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\SocialMediaStatus withoutTrashed()
 */
	class SocialMediaStatus extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class State.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property string $abbr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State query()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State whereAbbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\State whereUpdatedAt($value)
 */
	class State extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class Task.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $user_id
 * @property int $client_id
 * @property int $project_id
 * @property int $sector_id
 * @property int $action_id
 * @property int $priority_id
 * @property int $responsible_user_id
 * @property string $start_date
 * @property string $end_date
 * @property string|null $description
 * @property string|null $conclusion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\TaskAction $action
 * @property-read \AgenciaS3\Entities\Client $client
 * @property-read \AgenciaS3\Entities\TaskPriority $priority
 * @property-read \AgenciaS3\Entities\TaskProject $project
 * @property-read \AgenciaS3\Entities\User $responsible
 * @property-read \AgenciaS3\Entities\Sector $sector
 * @property-read \AgenciaS3\Entities\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\TaskUser[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Task onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereActionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereConclusion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereResponsibleUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereSectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\Task whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Task withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\Task withoutTrashed()
 */
	class Task extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class TaskAction.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $sector_id
 * @property int|null $task_action_id
 * @property string $name
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Sector $sector
 * @property-read \AgenciaS3\Entities\TaskAction|null $taskAction
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskAction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction whereSectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction whereTaskActionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskAction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskAction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskAction withoutTrashed()
 */
	class TaskAction extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class TaskPriority.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property string $color
 * @property int|null $order
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskPriority onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskPriority whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskPriority withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskPriority withoutTrashed()
 */
	class TaskPriority extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class TaskProject.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int|null $task_project_template_id
 * @property int|null $client_id
 * @property int|null $user_id
 * @property string $name
 * @property string $start_date
 * @property string|null $end_date
 * @property string $end_date_forecast
 * @property string|null $description
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Client|null $client
 * @property-read \AgenciaS3\Entities\TaskProjectTemplate|null $template
 * @property-read \AgenciaS3\Entities\User|null $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskProject onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereEndDateForecast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereTaskProjectTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProject whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskProject withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskProject withoutTrashed()
 */
	class TaskProject extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class TaskProjectTemplate.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int|null $task_project_template_id
 * @property string $name
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\TaskProjectTemplate|null $taskProjectTemplate
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskProjectTemplate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate whereTaskProjectTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskProjectTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskProjectTemplate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskProjectTemplate withoutTrashed()
 */
	class TaskProjectTemplate extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class TaskTime.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $task_user_id
 * @property string $start
 * @property string|null $end
 * @property string|null $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\TaskUser $taskUser
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskTime onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereTaskUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskTime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskTime withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskTime withoutTrashed()
 */
	class TaskTime extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class TaskUser.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property string|null $total
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Task $task
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\TaskTime[] $times
 * @property-read int|null $times_count
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TaskUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskUser withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TaskUser withoutTrashed()
 */
	class TaskUser extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class TypeClient.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\Client[] $clients
 * @property-read int|null $clients_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TypeClient onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TypeClient withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TypeClient withoutTrashed()
 */
	class TypeClient extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class TypeService.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property string $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TypeService onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\TypeService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TypeService withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\TypeService withoutTrashed()
 */
	class TypeService extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class User.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $image
 * @property string|null $phone
 * @property string|null $birth_date
 * @property string|null $session_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\UserManager[] $managers
 * @property-read int|null $managers_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \AgenciaS3\Entities\UserRole $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\UserSector[] $sectors
 * @property-read int|null $sectors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\SocialMediaPost[] $socialMediaPosts
 * @property-read int|null $social_media_posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\UserManager[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class UserManager.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $manager_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\User $manager
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserManager onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserManager whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserManager withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserManager withoutTrashed()
 */
	class UserManager extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class UserRole.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\AgenciaS3\Entities\User[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserRole newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserRole onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserRole query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserRole whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserRole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserRole withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserRole withoutTrashed()
 */
	class UserRole extends \Eloquent {}
}

namespace AgenciaS3\Entities{
/**
 * Class UserSector.
 *
 * @package namespace AgenciaS3\Entities;
 * @property int $id
 * @property int $user_id
 * @property int $sector_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AgenciaS3\Entities\Sector $sector
 * @property-read \AgenciaS3\Entities\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector newQuery()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserSector onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector whereSectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\AgenciaS3\Entities\UserSector whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserSector withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\AgenciaS3\Entities\UserSector withoutTrashed()
 */
	class UserSector extends \Eloquent {}
}

