<?php

namespace Metinet\Domain;


class SalleConference
{
    private $adresse ;
    private $nomsalle;
    private $ville;

    /**
     * SalleConference constructor.
     * @param $adresse
     * @param $nomsalle
     * @param $ville
     */
    public function __construct($adresse, $nomsalle, $ville)
    {
        $this->adresse = $adresse;
        $this->nomsalle = $nomsalle;
        $this->ville = $ville;
    }


}