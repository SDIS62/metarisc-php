<?php

namespace Metarisc\Model;

class Feature
{
    private ?string $type                              = null;
    private ?object $properties                        = null;
    private ?\Metarisc\Model\FeatureGeometry $geometry = null;

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type) : void
    {
        $this->type=$type;
    }

    public function getProperties() : ?object
    {
        return $this->properties;
    }

    public function setProperties(object $properties) : void
    {
        $this->properties=$properties;
    }

    public function getGeometry() : ?FeatureGeometry
    {
        return $this->geometry;
    }

    public function setGeometry(FeatureGeometry $geometry) : void
    {
        $this->geometry=$geometry;
    }
}