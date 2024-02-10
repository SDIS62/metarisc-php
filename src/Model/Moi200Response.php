<?php

namespace Metarisc\Model;

class Moi200Response extends ModelAbstract
{
    private ?string $id         = null;
    private ?string $first_name = null;
    private ?string $last_name  = null;
    private ?string $created_at = null;
    private ?string $updated_at = null;
    private ?string $timezone   = null;
    private ?bool $is_active    = null;
    private ?bool $is_verified  = null;
    private ?string $fonction   = null;
    private ?string $avatar_url = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['first_name'] */
        $object->setFirstName($data['first_name']);

        /** @var string $data['last_name'] */
        $object->setLastName($data['last_name']);

        /** @var string $data['created_at'] */
        $object->setCreatedAt($data['created_at']);

        /** @var string $data['updated_at'] */
        $object->setUpdatedAt($data['updated_at']);

        /** @var string $data['timezone'] */
        $object->setTimezone($data['timezone']);

        /** @var bool $data['is_active'] */
        $object->setIsActive($data['is_active']);

        /** @var bool $data['is_verified'] */
        $object->setIsVerified($data['is_verified']);

        /** @var string $data['fonction'] */
        $object->setFonction($data['fonction']);

        /** @var string $data['avatar_url'] */
        $object->setAvatarUrl($data['avatar_url']);

        return $object;
    }

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id = null) : void
    {
        $this->id=$id;
    }

    public function getFirstName() : ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name = null) : void
    {
        $this->first_name=$first_name;
    }

    public function getLastName() : ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name = null) : void
    {
        $this->last_name=$last_name;
    }

    public function getCreatedAt() : ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at) : void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() : ?string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?string $updated_at) : void
    {
        $this->updated_at = $updated_at;
    }

    public function getTimezone() : ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone = null) : void
    {
        $this->timezone=$timezone;
    }

    public function getIsActive() : ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active = null) : void
    {
        $this->is_active=$is_active;
    }

    public function getIsVerified() : ?bool
    {
        return $this->is_verified;
    }

    public function setIsVerified(bool $is_verified = null) : void
    {
        $this->is_verified=$is_verified;
    }

    public function getFonction() : ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction = null) : void
    {
        $this->fonction=$fonction;
    }

    public function getAvatarUrl() : ?string
    {
        return $this->avatar_url;
    }

    public function setAvatarUrl(string $avatar_url = null) : void
    {
        $this->avatar_url=$avatar_url;
    }
}
