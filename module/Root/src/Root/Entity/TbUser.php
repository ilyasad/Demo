<?php

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbUser
 *
 * @ORM\Table(name="tb_user")
 * @ORM\Entity
 */
class TbUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="text", length=65535, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="text", length=65535, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="q1", type="integer", nullable=false)
     */
    private $q1;

    /**
     * @var string
     *
     * @ORM\Column(name="r1", type="text", length=65535, nullable=false)
     */
    private $r1;

    /**
     * @var integer
     *
     * @ORM\Column(name="t1", type="integer", nullable=false)
     */
    private $t1;

    /**
     * @var integer
     *
     * @ORM\Column(name="q2", type="integer", nullable=false)
     */
    private $q2;

    /**
     * @var string
     *
     * @ORM\Column(name="r2", type="text", length=65535, nullable=false)
     */
    private $r2;

    /**
     * @var integer
     *
     * @ORM\Column(name="t2", type="integer", nullable=false)
     */
    private $t2;

    /**
     * @var integer
     *
     * @ORM\Column(name="q3", type="integer", nullable=false)
     */
    private $q3;

    /**
     * @var string
     *
     * @ORM\Column(name="r3", type="text", length=65535, nullable=false)
     */
    private $r3;

    /**
     * @var integer
     *
     * @ORM\Column(name="t3", type="integer", nullable=false)
     */
    private $t3;

    /**
     * @var integer
     *
     * @ORM\Column(name="q4", type="integer", nullable=false)
     */
    private $q4;

    /**
     * @var string
     *
     * @ORM\Column(name="r4", type="text", length=65535, nullable=false)
     */
    private $r4;

    /**
     * @var integer
     *
     * @ORM\Column(name="t4", type="integer", nullable=false)
     */
    private $t4;

    /**
     * @var integer
     *
     * @ORM\Column(name="q5", type="integer", nullable=false)
     */
    private $q5;

    /**
     * @var string
     *
     * @ORM\Column(name="r5", type="text", length=65535, nullable=false)
     */
    private $r5;

    /**
     * @var integer
     *
     * @ORM\Column(name="t5", type="integer", nullable=false)
     */
    private $t5;

    /**
     * @var integer
     *
     * @ORM\Column(name="q6", type="integer", nullable=false)
     */
    private $q6;

    /**
     * @var string
     *
     * @ORM\Column(name="r6", type="text", length=65535, nullable=false)
     */
    private $r6;

    /**
     * @var integer
     *
     * @ORM\Column(name="t6", type="integer", nullable=false)
     */
    private $t6;

    /**
     * @var string
     *
     * @ORM\Column(name="worl", type="text", length=65535, nullable=false)
     */
    private $worl;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return TbUser
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return TbUser
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return TbUser
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
     * Set q1
     *
     * @param integer $q1
     *
     * @return TbUser
     */
    public function setQ1($q1)
    {
        $this->q1 = $q1;

        return $this;
    }

    /**
     * Get q1
     *
     * @return integer
     */
    public function getQ1()
    {
        return $this->q1;
    }

    /**
     * Set r1
     *
     * @param string $r1
     *
     * @return TbUser
     */
    public function setR1($r1)
    {
        $this->r1 = $r1;

        return $this;
    }

    /**
     * Get r1
     *
     * @return string
     */
    public function getR1()
    {
        return $this->r1;
    }

    /**
     * Set t1
     *
     * @param integer $t1
     *
     * @return TbUser
     */
    public function setT1($t1)
    {
        $this->t1 = $t1;

        return $this;
    }

    /**
     * Get t1
     *
     * @return integer
     */
    public function getT1()
    {
        return $this->t1;
    }

    /**
     * Set q2
     *
     * @param integer $q2
     *
     * @return TbUser
     */
    public function setQ2($q2)
    {
        $this->q2 = $q2;

        return $this;
    }

    /**
     * Get q2
     *
     * @return integer
     */
    public function getQ2()
    {
        return $this->q2;
    }

    /**
     * Set r2
     *
     * @param string $r2
     *
     * @return TbUser
     */
    public function setR2($r2)
    {
        $this->r2 = $r2;

        return $this;
    }

    /**
     * Get r2
     *
     * @return string
     */
    public function getR2()
    {
        return $this->r2;
    }

    /**
     * Set t2
     *
     * @param integer $t2
     *
     * @return TbUser
     */
    public function setT2($t2)
    {
        $this->t2 = $t2;

        return $this;
    }

    /**
     * Get t2
     *
     * @return integer
     */
    public function getT2()
    {
        return $this->t2;
    }

    /**
     * Set q3
     *
     * @param integer $q3
     *
     * @return TbUser
     */
    public function setQ3($q3)
    {
        $this->q3 = $q3;

        return $this;
    }

    /**
     * Get q3
     *
     * @return integer
     */
    public function getQ3()
    {
        return $this->q3;
    }

    /**
     * Set r3
     *
     * @param string $r3
     *
     * @return TbUser
     */
    public function setR3($r3)
    {
        $this->r3 = $r3;

        return $this;
    }

    /**
     * Get r3
     *
     * @return string
     */
    public function getR3()
    {
        return $this->r3;
    }

    /**
     * Set t3
     *
     * @param integer $t3
     *
     * @return TbUser
     */
    public function setT3($t3)
    {
        $this->t3 = $t3;

        return $this;
    }

    /**
     * Get t3
     *
     * @return integer
     */
    public function getT3()
    {
        return $this->t3;
    }

    /**
     * Set q4
     *
     * @param integer $q4
     *
     * @return TbUser
     */
    public function setQ4($q4)
    {
        $this->q4 = $q4;

        return $this;
    }

    /**
     * Get q4
     *
     * @return integer
     */
    public function getQ4()
    {
        return $this->q4;
    }

    /**
     * Set r4
     *
     * @param string $r4
     *
     * @return TbUser
     */
    public function setR4($r4)
    {
        $this->r4 = $r4;

        return $this;
    }

    /**
     * Get r4
     *
     * @return string
     */
    public function getR4()
    {
        return $this->r4;
    }

    /**
     * Set t4
     *
     * @param integer $t4
     *
     * @return TbUser
     */
    public function setT4($t4)
    {
        $this->t4 = $t4;

        return $this;
    }

    /**
     * Get t4
     *
     * @return integer
     */
    public function getT4()
    {
        return $this->t4;
    }

    /**
     * Set q5
     *
     * @param integer $q5
     *
     * @return TbUser
     */
    public function setQ5($q5)
    {
        $this->q5 = $q5;

        return $this;
    }

    /**
     * Get q5
     *
     * @return integer
     */
    public function getQ5()
    {
        return $this->q5;
    }

    /**
     * Set r5
     *
     * @param string $r5
     *
     * @return TbUser
     */
    public function setR5($r5)
    {
        $this->r5 = $r5;

        return $this;
    }

    /**
     * Get r5
     *
     * @return string
     */
    public function getR5()
    {
        return $this->r5;
    }

    /**
     * Set t5
     *
     * @param integer $t5
     *
     * @return TbUser
     */
    public function setT5($t5)
    {
        $this->t5 = $t5;

        return $this;
    }

    /**
     * Get t5
     *
     * @return integer
     */
    public function getT5()
    {
        return $this->t5;
    }

    /**
     * Set q6
     *
     * @param integer $q6
     *
     * @return TbUser
     */
    public function setQ6($q6)
    {
        $this->q6 = $q6;

        return $this;
    }

    /**
     * Get q6
     *
     * @return integer
     */
    public function getQ6()
    {
        return $this->q6;
    }

    /**
     * Set r6
     *
     * @param string $r6
     *
     * @return TbUser
     */
    public function setR6($r6)
    {
        $this->r6 = $r6;

        return $this;
    }

    /**
     * Get r6
     *
     * @return string
     */
    public function getR6()
    {
        return $this->r6;
    }

    /**
     * Set t6
     *
     * @param integer $t6
     *
     * @return TbUser
     */
    public function setT6($t6)
    {
        $this->t6 = $t6;

        return $this;
    }

    /**
     * Get t6
     *
     * @return integer
     */
    public function getT6()
    {
        return $this->t6;
    }

    /**
     * Set worl
     *
     * @param string $worl
     *
     * @return TbUser
     */
    public function setWorl($worl)
    {
        $this->worl = $worl;

        return $this;
    }

    /**
     * Get worl
     *
     * @return string
     */
    public function getWorl()
    {
        return $this->worl;
    }
}
