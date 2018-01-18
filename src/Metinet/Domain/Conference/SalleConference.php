<?php

namespace Metinet\Domain;


class SalleConference
{
    private $adresse ;
    private $nomSalle;
    private $ville;
    private $nombreDePlace;

    /**
     * SalleConference constructor.
     * @param $adresse
     * @param $nomsalle
     * @param $ville
     */
    public function __construct($adresse, $nomSalle, $ville, $nombreDePlace)
    {
        $this->adresse = $adresse;
        $this->nomSalle = $nomSalle;
        $this->ville = $ville;
        $this->nombreDePlace = $nombreDePlace;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getNomSalle()
    {
        return $this->nomSalle;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return mixed
     */
    public function getNombreDePlace()
    {
        return $this->nombreDePlace;
    }




}