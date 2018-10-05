<?php

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QTheme
 *
 * @ORM\Table(name="q_theme", indexes={@ORM\Index(name="fk_theme_admin", columns={"idFkAdmin"})})
 * @ORM\Entity
 */
class QTheme
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTheme", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtheme;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbQuestion", type="integer", nullable=false)
     */
    private $nbquestion = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="imgPath", type="string", length=255, nullable=true)
     */
    private $imgpath;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=false)
     */
    private $isactive = '1';

    /**
     * @var \Root\Entity\QAdmin
     *
     * @ORM\ManyToOne(targetEntity="Root\Entity\QAdmin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFkAdmin", referencedColumnName="idAdmin")
     * })
     */
    private $idfkadmin;



    /**
     * Get idtheme
     *
     * @return integer
     */
    public function getIdtheme()
    {
        return $this->idtheme;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return QTheme
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nbquestion
     *
     * @param integer $nbquestion
     *
     * @return QTheme
     */
    public function setNbquestion($nbquestion)
    {
        $this->nbquestion = $nbquestion;

        return $this;
    }

    /**
     * Get nbquestion
     *
     * @return integer
     */
    public function getNbquestion()
    {
        return $this->nbquestion;
    }

    /**
     * Set imgpath
     *
     * @param string $imgpath
     *
     * @return QTheme
     */
    public function setImgpath($imgpath)
    {
        $this->imgpath = $imgpath;

        return $this;
    }

    /**
     * Get imgpath
     *
     * @return string
     */
    public function getImgpath()
    {
        return $this->imgpath;
    }

    /**
     * Set isactive
     *
     * @param boolean $isactive
     *
     * @return QTheme
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return boolean
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set idfkadmin
     *
     * @param \Root\Entity\QAdmin $idfkadmin
     *
     * @return QTheme
     */
    public function setIdfkadmin(\Root\Entity\QAdmin $idfkadmin = null)
    {
        $this->idfkadmin = $idfkadmin;

        return $this;
    }

    /**
     * Get idfkadmin
     *
     * @return \Root\Entity\QAdmin
     */
    public function getIdfkadmin()
    {
        return $this->idfkadmin;
    }
}
