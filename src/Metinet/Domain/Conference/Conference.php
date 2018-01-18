<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:07
 */

namespace Metinet\Domain;


class Conference
{
    private $name;
    private $dateConference;
    private $description;
    private $objectif;
    private $student;
    private $numberOfParticipant;
    private $salleConference;
    private $lieu;

    /**
     * Conference constructor.
     * @param $date
     * @param $description
     * @param $objectif
     * @param $leResponsable
     * @param $numberOfParticipant
     * @param $salle
     */

    public function __construct(string $name, DateConference $dateConference, string $description, string  $objectif, Student $student, int  $numberOfParticipant, SalleConference $salleConference, string $lieu)
    {
        $this->name = $name;
        $this->date = $dateConference;
        $this->description = $description;
        $this->objectif = $objectif;
        $this->student = $student;
        $this->numberOfParticipant = $numberOfParticipant;
        $this->salleEvenement = $salleConference;
        $this->lieu= $lieu;
    }


    /**
     * @return mixed
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLieu(): string
    {
        return $this->lieu;
    }



    /**
     * @return mixed
     */
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getObjectif():string
    {
        return $this->objectif;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getNumberOfParticipant(): int
    {
        return $this->numberOfParticipant;
    }


    /**
     * Conference constructor.
     */

    public function canCreateConference(Student $student): bool
    {
        if($student )
    }

    /**
     * Conference constructor.
     * @param $date
     */

    public function createConference(Student $student ): self
    {


    }

    public function inscription():self
    {


    }

}