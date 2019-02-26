<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Materiels
 *
 * @ORM\Table(name="materiels")
 * @ORM\Entity
 */



class Materiels
{
    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="materiels")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */
    private $categorie;




    /**
     * @var integer
     *
     * @ORM\Column(name="id_matriel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatriel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;



    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="integer", length=20, nullable=false)
     */
    private $statut;

    /**
     * @return int
     */
    public function getIdMatriel()
    {
        return $this->idMatriel;
    }

    /**
     * @param int $idMatriel
     */
    public function setIdMatriel($idMatriel)
    {
        $this->idMatriel = $idMatriel;
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
     * @return int
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param int $qte
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
    }

    /**
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param integer $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * Get nomImage

     * @return string
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }

    /**
     * Set nomImage
     * @param  string $nomImage
     *
     * @return mixed
     *
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage = $nomImage;
        return $this;
    }



    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $nomImage;

    /**
     * @Assert\File(maxSize="500k")
     */
    public $file;



    public function getWebPath()
    {
        return null===$this->nomImage ? null : $this->getUploadDir.'/'.$this->nomImage;
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function getUploadDir()
    {
        return 'images';
    }

    public function uploadProfilePicture()
    {
        $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalName());
        $this->nomImage=$this->file->getClientOriginalName();
        $this->file=null;
    }




}

