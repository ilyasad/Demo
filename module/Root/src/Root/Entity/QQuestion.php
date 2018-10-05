<?php

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QQuestion
 *
 * @ORM\Table(name="q_question", indexes={@ORM\Index(name="fk_question_theme", columns={"idFkTheme"})})
 * @ORM\Entity
 */
class QQuestion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idQuestion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idquestion;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=false)
     */
    private $content;

    /**
     * @var \Root\Entity\QTheme
     *
     * @ORM\ManyToOne(targetEntity="Root\Entity\QTheme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFkTheme", referencedColumnName="idTheme")
     * })
     */
    private $idfktheme;



    /**
     * Get idquestion
     *
     * @return integer
     */
    public function getIdquestion()
    {
        return $this->idquestion;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return QQuestion
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
     * Set idfktheme
     *
     * @param \Root\Entity\QTheme $idfktheme
     *
     * @return QQuestion
     */
    public function setIdfktheme(\Root\Entity\QTheme $idfktheme = null)
    {
        $this->idfktheme = $idfktheme;

        return $this;
    }

    /**
     * Get idfktheme
     *
     * @return \Root\Entity\QTheme
     */
    public function getIdfktheme()
    {
        return $this->idfktheme;
    }
}
