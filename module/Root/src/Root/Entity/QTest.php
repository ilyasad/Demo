<?php

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QTest
 *
 * @ORM\Table(name="q_test", indexes={@ORM\Index(name="fk_test_user", columns={"idFkUser"})})
 * @ORM\Entity
 */
class QTest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTest", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime", nullable=false)
     */
    private $creationdate;

    /**
     * @var string
     *
     * @ORM\Column(name="score", type="string", length=45, nullable=false)
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="result", type="string", length=45, nullable=false)
     */
    private $result;

    /**
     * @var \Root\Entity\QUser
     *
     * @ORM\ManyToOne(targetEntity="Root\Entity\QUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFkUser", referencedColumnName="idUser")
     * })
     */
    private $idfkuser;



    /**
     * Get idtest
     *
     * @return integer
     */
    public function getIdtest()
    {
        return $this->idtest;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return QTest
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    /**
     * Set score
     *
     * @param string $score
     *
     * @return QTest
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set result
     *
     * @param string $result
     *
     * @return QTest
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set idfkuser
     *
     * @param \Root\Entity\QUser $idfkuser
     *
     * @return QTest
     */
    public function setIdfkuser(\Root\Entity\QUser $idfkuser = null)
    {
        $this->idfkuser = $idfkuser;

        return $this;
    }

    /**
     * Get idfkuser
     *
     * @return \Root\Entity\QUser
     */
    public function getIdfkuser()
    {
        return $this->idfkuser;
    }
}
