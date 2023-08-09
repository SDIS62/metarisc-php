<?php

namespace Metarisc\Models;

class DescriptifTechniqueDECIBase extends DescriptifTechniqueBase
{
    private ?array $anomalies=null;

    private ?bool $est_reglementaire    = null;
    private ?bool $est_reforme          = null;
    private ?string $domanialite        = null;
    private ?bool $est_conforme         = null;
    private ?int $performance_theorique = null;
    private ?int $performance_reelle    = null;
    public function getAnomalies() : array
    {
        return $this->anomalies;
    }

    public function setAnomalies(array $anomalies)
    {
        $this->anomalies=$anomalies;
    }

    public function getEstReglementaire() : ?bool
    {
        return $this->est_reglementaire;
    }

    public function setEstReglementaire(bool $est_reglementaire)
    {
        $this->est_reglementaire=$est_reglementaire;
    }

    public function getEstReforme() : ?bool
    {
        return $this->est_reforme;
    }

    public function setEstReforme(bool $est_reforme)
    {
        $this->est_reforme=$est_reforme;
    }

    public function getDomanialite() : ?string
    {
        return $this->domanialite;
    }

    public function setDomanialite(string $domanialite)
    {
        $this->domanialite=$domanialite;
    }

    public function getEstConforme() : ?bool
    {
        return $this->est_conforme;
    }

    public function setEstConforme(bool $est_conforme)
    {
        $this->est_conforme=$est_conforme;
    }

    public function getPerformanceTheorique() : ?int
    {
        return $this->performance_theorique;
    }

    public function setPerformanceTheorique(int $performance_theorique)
    {
        $this->performance_theorique=$performance_theorique;
    }

    public function getPerformanceReelle() : ?int
    {
        return $this->performance_reelle;
    }

    public function setPerformanceReelle(int $performance_reelle)
    {
        $this->performance_reelle=$performance_reelle;
    }
}
