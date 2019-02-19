<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeJardinier
 *
 * @ORM\Table(name="commande_jardinier", indexes={@ORM\Index(name="id_dm", columns={"id_dm"}), @ORM\Index(name="id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class CommandeJardinier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_jardinier", type="integer", nullable=false)
     */
    private $idJardinier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sortie", type="date", nullable=false)
     */
    private $dateSortie;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="validation_client", type="string", length=5, nullable=false)
     */
    private $validationClient = 'non';

    /**
     * @var string
     *
     * @ORM\Column(name="validation_jardinier", type="string", length=5, nullable=false)
     */
    private $validationJardinier = 'non';

    /**
     * @var \DetailMateriel
     *
     * @ORM\ManyToOne(targetEntity="DetailMateriel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dm", referencedColumnName="id_dm")
     * })
     */
    private $idDm;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="cin")
     * })
     */
    private $idClient;

    /**
     * @return int
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param int $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return int
     */
    public function getIdJardinier()
    {
        return $this->idJardinier;
    }

    /**
     * @param int $idJardinier
     */
    public function setIdJardinier($idJardinier)
    {
        $this->idJardinier = $idJardinier;
    }

    /**
     * @return \DateTime
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * @param \DateTime $dateSortie
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;
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
     * @return string
     */
    public function getValidationClient()
    {
        return $this->validationClient;
    }

    /**
     * @param string $validationClient
     */
    public function setValidationClient($validationClient)
    {
        $this->validationClient = $validationClient;
    }

    /**
     * @return string
     */
    public function getValidationJardinier()
    {
        return $this->validationJardinier;
    }

    /**
     * @param string $validationJardinier
     */
    public function setValidationJardinier($validationJardinier)
    {
        $this->validationJardinier = $validationJardinier;
    }

    /**
     * @return \DetailMateriel
     */
    public function getIdDm()
    {
        return $this->idDm;
    }

    /**
     * @param \DetailMateriel $idDm
     */
    public function setIdDm($idDm)
    {
        $this->idDm = $idDm;
    }

    /**
     * @return \User
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param \User $idClient
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }


}

