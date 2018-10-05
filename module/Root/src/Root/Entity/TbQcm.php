<?php

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbQcm
 *
 * @ORM\Table(name="tb_qcm")
 * @ORM\Entity
 */
class TbQcm
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
     * @ORM\Column(name="theme", type="string", length=20, nullable=true)
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=94, nullable=true)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_1", type="string", length=127, nullable=true)
     */
    private $reponse1;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_1_v", type="string", length=5, nullable=true)
     */
    private $reponse1V;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_2", type="string", length=121, nullable=true)
     */
    private $reponse2;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_2_v", type="string", length=5, nullable=true)
     */
    private $reponse2V;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_3", type="string", length=122, nullable=true)
     */
    private $reponse3;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_3_v", type="string", length=5, nullable=true)
     */
    private $reponse3V;



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
     * Set theme
     *
     * @param string $theme
     *
     * @return TbQcm
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set question
     *
     * @param string $question
     *
     * @return TbQcm
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set reponse1
     *
     * @param string $reponse1
     *
     * @return TbQcm
     */
    public function setReponse1($reponse1)
    {
        $this->reponse1 = $reponse1;

        return $this;
    }

    /**
     * Get reponse1
     *
     * @return string
     */
    public function getReponse1()
    {
        return $this->reponse1;
    }

    /**
     * Set reponse1V
     *
     * @param string $reponse1V
     *
     * @return TbQcm
     */
    public function setReponse1V($reponse1V)
    {
        $this->reponse1V = $reponse1V;

        return $this;
    }

    /**
     * Get reponse1V
     *
     * @return string
     */
    public function getReponse1V()
    {
        return $this->reponse1V;
    }

    /**
     * Set reponse2
     *
     * @param string $reponse2
     *
     * @return TbQcm
     */
    public function setReponse2($reponse2)
    {
        $this->reponse2 = $reponse2;

        return $this;
    }

    /**
     * Get reponse2
     *
     * @return string
     */
    public function getReponse2()
    {
        return $this->reponse2;
    }

    /**
     * Set reponse2V
     *
     * @param string $reponse2V
     *
     * @return TbQcm
     */
    public function setReponse2V($reponse2V)
    {
        $this->reponse2V = $reponse2V;

        return $this;
    }

    /**
     * Get reponse2V
     *
     * @return string
     */
    public function getReponse2V()
    {
        return $this->reponse2V;
    }

    /**
     * Set reponse3
     *
     * @param string $reponse3
     *
     * @return TbQcm
     */
    public function setReponse3($reponse3)
    {
        $this->reponse3 = $reponse3;

        return $this;
    }

    /**
     * Get reponse3
     *
     * @return string
     */
    public function getReponse3()
    {
        return $this->reponse3;
    }

    /**
     * Set reponse3V
     *
     * @param string $reponse3V
     *
     * @return TbQcm
     */
    public function setReponse3V($reponse3V)
    {
        $this->reponse3V = $reponse3V;

        return $this;
    }

    /**
     * Get reponse3V
     *
     * @return string
     */
    public function getReponse3V()
    {
        return $this->reponse3V;
    }
}
