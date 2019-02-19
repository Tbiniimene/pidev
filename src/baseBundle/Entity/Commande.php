<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="id_dc", columns={"id_dc"}), @ORM\Index(name="id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande_p", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommandeP;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_cmd", type="date", nullable=false)
     */
    private $dateCmd;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \DetailCommande
     *
     * @ORM\ManyToOne(targetEntity="DetailCommande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dc", referencedColumnName="id_dc")
     * })
     */
    private $idDc;

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
    public function getIdCommandeP()
    {
        return $this->idCommandeP;
    }

    /**
     * @param int $idCommandeP
     */
    public function setIdCommandeP($idCommandeP)
    {
        $this->idCommandeP = $idCommandeP;
    }

    /**
     * @return \DateTime
     */
    public function getDateCmd()
    {
        return $this->dateCmd;
    }

    /**
     * @param \DateTime $dateCmd
     */
    public function setDateCmd($dateCmd)
    {
        $this->dateCmd = $dateCmd;
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
     * @return \DetailCommande
     */
    public function getIdDc()
    {
        return $this->idDc;
    }

    /**
     * @param \DetailCommande $idDc
     */
    public function setIdDc($idDc)
    {
        $this->idDc = $idDc;
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

