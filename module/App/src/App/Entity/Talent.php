<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Talent
 *
 * @ORM\Table(name="talent")
 * @ORM\Entity
 */
class Talent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_talent", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTalent;

    /**
     * @var string
     *
     * @ORM\Column(name="tlgn", type="string", length=255, nullable=false)
     */
    private $tlgn;

    /**
     * @var string
     *
     * @ORM\Column(name="tpwd", type="string", length=255, nullable=false)
     */
    private $tpwd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     */
    private $dateCreation;



    /**
     * Get idTalent
     *
     * @return integer
     */
    public function getIdTalent()
    {
        return $this->idTalent;
    }

    /**
     * Set tlgn
     *
     * @param string $tlgn
     *
     * @return Talent
     */
    public function setTlgn($tlgn)
    {
        $this->tlgn = $tlgn;

        return $this;
    }

    /**
     * Get tlgn
     *
     * @return string
     */
    public function getTlgn()
    {
        return $this->tlgn;
    }

    /**
     * Set tpwd
     *
     * @param string $tpwd
     *
     * @return Talent
     */
    public function setTpwd($tpwd)
    {
        $this->tpwd = $tpwd;

        return $this;
    }

    /**
     * Get tpwd
     *
     * @return string
     */
    public function getTpwd()
    {
        return $this->tpwd;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Talent
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
}
