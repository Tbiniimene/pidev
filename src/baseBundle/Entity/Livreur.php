<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livreur
 *
 * @ORM\Table(name="livreur", indexes={@ORM\Index(name="id_dispo", columns={"id_dispo"})})
 * @ORM\Entity
 */
class Livreur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_livreur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivreur;

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
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=20, nullable=true)
     */
    private $etat = 'disponible';

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="text", length=65535, nullable=false)
     */
    private $localisation;

    /**
     * @var \Disponibilite
     *
     * @ORM\ManyToOne(targetEntity="Disponibilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dispo", referencedColumnName="id_dispo")
     * })
     */
    private $idDispo;

    /**
     * @return int
     */
    public function getIdLivreur()
    {
        return $this->idLivreur;
    }

    /**
     * @param int $idLivreur
     */
    public function setIdLivreur($idLivreur)
    {
        $this->idLivreur = $idLivreur;
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
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
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
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param string $localisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }

    /**
     * @return \Disponibilite
     */
    public function getIdDispo()
    {
        return $this->idDispo;
    }

    /**
     * @param \Disponibilite $idDispo
     */
    public function setIdDispo($idDispo)
    {
        $this->idDispo = $idDispo;
    }


}

