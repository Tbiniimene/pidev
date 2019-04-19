<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="baseBundle\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="Genre")
     * @ORM\JoinColumn(name="id_genre", referencedColumnName="id_genre")
     */
    protected $idGenre;
    /**
     * @var integer
     *
     * @ORM\Column(name="id_Annonce", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $idAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", nullable=false)
     *
     */
    protected $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE", type="date", nullable=false)
     *
     */
    protected $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     *
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", nullable=false)
     *
     */
    protected $titre;


    /**
     * @return int
     */
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }


    /**
     * @param int $idAnnonce
     */
    public function setIdAnnonce($idAnnonce)
    {
        $this->idAnnonce = $idAnnonce;
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
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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





    public function getWebPath()
    {
        return null===$this->nomImage ? null : $this->getUploadDir.'/'.$this->nomImage;
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
    /**
     * @Assert\File(maxSize="500k")
     */
    public $file;

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
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


