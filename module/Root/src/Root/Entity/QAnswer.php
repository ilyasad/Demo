<?php

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QAnswer
 *
 * @ORM\Table(name="q_answer", indexes={@ORM\Index(name="fk_answer_question", columns={"idFkQuestion"})})
 * @ORM\Entity
 */
class QAnswer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAnswer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idanswer;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=false)
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isTrue", type="boolean", nullable=false)
     */
    private $istrue;

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
     * Get idanswer
     *
     * @return integer
     */
    public function getIdanswer()
    {
        return $this->idanswer;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return QAnswer
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set istrue
     *
     * @param boolean $istrue
     *
     * @return QAnswer
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
     * Set idfkquestion
     *
     * @param \Root\Entity\QQuestion $idfkquestion
     *
     * @return QAnswer
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
}
