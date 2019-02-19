<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailCommande
 *
 * @ORM\Table(name="detail_commande", indexes={@ORM\Index(name="id_p", columns={"id_p"}), @ORM\Index(name="id_m", columns={"id_m"})})
 * @ORM\Entity
 */
class DetailCommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDc;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @var \Produits
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_p", referencedColumnName="id_produit")
     * })
     */
    private $idP;

    /**
     * @var \Materiels
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Materiels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_m", referencedColumnName="id_matriel")
     * })
     */
    private $idM;

    /**
     * @return int
     */
    public function getIdDc()
    {
        return $this->idDc;
    }

    /**
     * @param int $idDc
     */
    public function setIdDc($idDc)
    {
        $this->idDc = $idDc;
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
     * @return \Produits
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param \Produits $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }

    /**
     * @return \Materiels
     */
    public function getIdM()
    {
        return $this->idM;
    }

    /**
     * @param \Materiels $idM
     */
    public function setIdM($idM)
    {
        $this->idM = $idM;
    }


}

