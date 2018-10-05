<?php

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QResponse
 *
 * @ORM\Table(name="q_response", indexes={@ORM\Index(name="fk_response_question", columns={"idFkQuestion"}), @ORM\Index(name="fk_response_answer", columns={"idFkAnswer"}), @ORM\Index(name="fk_response_test", columns={"idFkTest"})})
 * @ORM\Entity
 */
class QResponse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idResponse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idresponse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isTrue", type="boolean", nullable=false)
     */
    private $istrue;

    /**
     * @var \Root\Entity\QAnswer
     *
     * @ORM\ManyToOne(targetEntity="Root\Entity\QAnswer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFkAnswer", referencedColumnName="idAnswer")
     * })
     */
    private $idfkanswer;

    /**
     * @var \Root\Entity\QQuestion
     *
     * @ORM\ManyToOne(targetEntity="Root\Entity\QQuestion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFkQuestion", referencedColumnName="idQuestion")
     * })
     */
    private $idfkquestion;

    /**
     * @var \Root\Entity\QTest
     *
     * @ORM\ManyToOne(targetEntity="Root\Entity\QTest")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFkTest", referencedColumnName="idTest")
     * })
     */
    private $idfktest;



    /**
     * Get idresponse
     *
     * @return integer
     */
    public function getIdresponse()
    {
        return $this->idresponse;
    }

    /**
     * Set istrue
     *
     * @param boolean $istrue
     *
     * @return QResponse
     */
    public function setIstrue($istrue)
    {
        $this->istrue = $istrue;

        return $this;
    }

    /**
     * Get istrue
     *
     * @return boolean
     */
    public function getIstrue()
    {
        return $this->istrue;
    }

    /**
     * Set idfkanswer
     *
     * @param \Root\Entity\QAnswer $idfkanswer
     *
     * @return QResponse
     */
    public function setIdfkanswer(\Root\Entity\QAnswer $idfkanswer = null)
    {
        $this->idfkanswer = $idfkanswer;

        return $this;
    }

    /**
     * Get idfkanswer
     *
     * @return \Root\Entity\QAnswer
     */
    public function getIdfkanswer()
    {
        return $this->idfkanswer;
    }

    /**
     * Set idfkquestion
     *
     * @param \Root\Entity\QQuestion $idfkquestion
     *
     * @return QResponse
     */
    public function setIdfkquestion(\Root\Entity\QQuestion $idfkquestion = null)
    {
        $this->idfkquestion = $idfkquestion;

        return $this;
    }

    /**
     * Get idfkquestion
     *
     * @return \Root\Entity\QQuestion
     */
    public function getIdfkquestion()
    {
        return $this->idfkquestion;
    }

    /**
     * Set idfktest
     *
     * @param \Root\Entity\QTest $idfktest
     *
     * @return QResponse
     */
    public function setIdfktest(\Root\Entity\QTest $idfktest = null)
    {
        $this->idfktest = $idfktest;

        return $this;
    }

    /**
     * Get idfktest
     *
     * @return \Root\Entity\QTest
     */
    public function getIdfktest()
    {
        return $this->idfktest;
    }
}
