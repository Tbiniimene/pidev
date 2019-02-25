<?php

namespace baseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="baseBundle\Repository\CategorieRepository")
 */
class Categorie


{
    // ...

    /**
     * @ORM\OneToMany(targetEntity="Materiels", mappedBy="categorie", cascade={"remove"})
     */
    private $materiels;

    public function __construct()
    {
        $this->materiels = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getMateriels()
    {
        return $this->Materiels;
    }

    /**
     * @param ArrayCollection $Materiels
     */
    public function setMateriels($Materiels)
    {
        $this->Materiels = $Materiels;
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
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;


    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


}

