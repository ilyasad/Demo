<?php

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QUser
 *
 * @ORM\Table(name="q_user", indexes={@ORM\Index(name="fk_user_admin", columns={"idFkAdmin"})})
 * @ORM\Entity
 */
class QUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerDate", type="datetime", nullable=false)
     */
    private $registerdate;

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
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return QUser
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return QUser
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return QUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set registerdate
     *
     * @param \DateTime $registerdate
     *
     * @return QUser
     */
    public function setRegisterdate($registerdate)
    {
        $this->registerdate = $registerdate;

        return $this;
    }

    /**
     * Get registerdate
     *
     * @return \DateTime
     */
    public function getRegisterdate()
    {
        return $this->registerdate;
    }

    /**
     * Set idfkadmin
     *
     * @param \Root\Entity\QAdmin $idfkadmin
     *
     * @return QUser
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
