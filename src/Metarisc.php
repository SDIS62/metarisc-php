<?php

namespace Metarisc;

use Metarisc\Service\ERPAPI;
use Metarisc\Service\MoiAPI;
use Metarisc\Service\PEIAPI;
use Metarisc\Service\FeedAPI;
use Metarisc\Service\PingAPI;
use Metarisc\Service\ContactsAPI;
use Metarisc\Service\DossiersAPI;
use Metarisc\Service\AnomaliesAPI;
use Metarisc\Service\DocumentsAPI;
use Metarisc\Service\EvenementsAPI;
use Metarisc\Service\CommissionsAPI;
use Metarisc\Service\TournesDECIAPI;
use Metarisc\Service\UtilisateursAPI;
use Metarisc\Service\NotificationsAPI;
use Metarisc\Service\OrganisationsAPI;
use Metarisc\Service\PrescriptionsAPI;

class Metarisc extends MetariscAbstract
{
    public static array $class_map =  [
        'utilisateurs'            => UtilisateursAPI::class,
        'erp'                     => ERPAPI::class,
        'dossiers'                => DossiersAPI::class,
        'documents'               => DocumentsAPI::class,
        'moi'                     => MoiAPI::class,
        'ping'                    => PingAPI::class,
        'anomalies'               => AnomaliesAPI::class,
        'supports_reglementaires' => PrescriptionsAPI::class,
        'feed'                    => FeedAPI::class,
        'tournees_deci'           => TournesDECIAPI::class,
        'organisations'           => OrganisationsAPI::class,
        'pei'                     => PEIAPI::class,
        'commissions'             => CommissionsAPI::class,
        'evenements'              => EvenementsAPI::class,
        'prescriptions'           => PrescriptionsAPI::class,
        'contacts'                => ContactsAPI::class,
        'notifications'           => NotificationsAPI::class,
    ];

    public function __get(string $name)
    {
        /** @var class-string<MetariscAbstract>|null $class_name */
        $class_name = \array_key_exists($name, self::$class_map) ? self::$class_map[$name] : null;

        \assert(null !== $class_name, "Service $name inconnu");

        return new $class_name($this->getConfig(), $this->getClient());
    }
}
