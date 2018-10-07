<?php

namespace Map\Entity;

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


}

