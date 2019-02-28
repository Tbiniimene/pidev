<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParticipantFormation
 *
 * @ORM\Table(name="participant_formation", indexes={@ORM\Index(name="id_formation", columns={"id_formation"})})
 * @ORM\Entity
 */
class ParticipantFormation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;


    /**
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumn(name="id_formation",referencedColumnName="id_formation" , onDelete ="CASCADE")
     *
     */
    private $PFormation;

    /**
     * @return int
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param int $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param int $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getPFormation()
    {
        return $this->PFormation;
    }

    /**
     * @param mixed $PFormation
     */
    public function setPFormation($PFormation)
    {
        $this->PFormation = $PFormation;
    }


}

