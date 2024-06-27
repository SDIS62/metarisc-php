<?php

namespace Metarisc\Model;

/*
 * Représente un membre d'une organisation.
*/

class OrganisationMembre extends ModelAbstract
{
    private ?\Metarisc\Model\OrganisationMembreOrganisation $organisation = null;
    private ?\Metarisc\Model\OrganisationMembreUtilisateur $utilisateur   = null;
    private ?string $utilisateur_id                                       = null;
    private ?string $date_integration                                     = null;
    private ?string $role                                                 = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['organisation'] */
        $object->setOrganisation($data['organisation']);

        /** @var array<array-key, mixed> $data['utilisateur'] */
        $object->setUtilisateur($data['utilisateur']);

        /** @var string $data['utilisateur_id'] */
        $object->setUtilisateurId($data['utilisateur_id']);

        /** @var string $data['date_integration'] */
        $object->setDateIntegration($data['date_integration']);

        /** @var string $data['role'] */
        $object->setRole($data['role']);

        return $object;
    }

    public function getOrganisation() : ?OrganisationMembreOrganisation
    {
        return $this->organisation;
    }

    public function setOrganisation(array $organisation) : void
    {
        $this->organisation=OrganisationMembreOrganisation::unserialize($organisation);
    }

    public function getUtilisateur() : ?OrganisationMembreUtilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(array $utilisateur) : void
    {
        $this->utilisateur=OrganisationMembreUtilisateur::unserialize($utilisateur);
    }

    public function getUtilisateurId() : ?string
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(string $utilisateur_id = null) : void
    {
        $this->utilisateur_id=$utilisateur_id;
    }

    public function getDateIntegration() : ?string
    {
        return $this->date_integration;
    }

    public function setDateIntegration(?string $date_integration) : void
    {
        $this->date_integration = $date_integration;
    }

    public function getRole() : ?string
    {
        return $this->role;
    }

    public function setRole(string $role = null) : void
    {
        $this->role=$role;
    }
}
