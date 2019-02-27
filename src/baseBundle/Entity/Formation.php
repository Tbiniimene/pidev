<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_formation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_deb", type="date", nullable=false)
     */
    private $dateDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;
    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=false)
     */
    private $img;
    /**
     * @var string
     *
     * @ORM\Column(name="addresse", type="string", length=30, nullable=false)
     */
    private $addresse;
    /**
     * @var integer
     *
     * @ORM\Column(name="nbmax", type="integer", nullable=false)
     */

    private $nbmax;
    /**
     * @ORM\ManyToOne(targetEntity="Formateur")
     * @ORM\JoinColumn(name="formateur_id",referencedColumnName="id_formateur" ,onDelete = "SET NULL")
     *
     */
    private $Formateur;

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * @param string $addresse
     */
    public function setAddresse($addresse)
    {
        $this->addresse = $addresse;
    }



    /**
     * @return int
     */
    public function getNbmax()
    {
        return $this->nbmax;
    }

    /**
     * @param int $nbmax
     */
    public function setNbmax($nbmax)
    {
        $this->nbmax = $nbmax;
    }

 /**
     *
     * Get id
     * @return int
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }



    /**
     * @param int $idFormation
     */
    public function setIdFormation($idFormation)
    {
        $this->idFormation = $idFormation;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return \DateTime
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * @param \DateTime $dateDeb
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param \DateTime $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getFormateur()
    {
        return $this->Formateur;
    }

    /**
     * @param mixed $Formateur
     */
    public function setFormateur($Formateur)
    {
        $this->Formateur = $Formateur;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



}

