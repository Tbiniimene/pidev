<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailCouffin
 *
 * @ORM\Table(name="detail_couffin", indexes={@ORM\Index(name="id_produit", columns={"id_produit"})})
 * @ORM\Entity
 */
class DetailCouffin
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
     *   @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     * })
     */
    private $idProduit;

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
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param \Produits $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }


}

