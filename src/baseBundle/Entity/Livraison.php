<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="id_livreur", columns={"id_livreur"}), @ORM\Index(name="id_commande", columns={"id_commande"}), @ORM\Index(name="id_reservation", columns={"id_reservation"})})
 * @ORM\Entity
 */
class Livraison
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_livraison", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idLivraison;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=30, nullable=false)
     */
    private $etat;

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
     * @var \Livreur
     *
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_livreur", referencedColumnName="id_livreur", nullable=false)
     * })
     */
    private $idLivreur;

    /**
     * @var \Commande
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande_p", nullable=true)
     * })
     */
    private $idCommande;

    /**
     * @var \ReservationMateriel
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ReservationMateriel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reservation", referencedColumnName="id_res", nullable=true)
     * })
     */
    private $idReservation;

    /**
     * @return int
     */
    public function getIdLivraison()
    {
        return $this->idLivraison;
    }

    /**
     * @param int $idLivraison
     */
    public function setIdLivraison($idLivraison)
    {
        $this->idLivraison = $idLivraison;
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
     * @return \Livreur
     */
    public function getIdLivreur()
    {
        return $this->idLivreur;
    }

    /**
     * @param \Livreur $idLivreur
     */
    public function setIdLivreur($idLivreur)
    {
        $this->idLivreur = $idLivreur;
    }

    /**
     * @return \Commande
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param \Commande $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return \ReservationMateriel
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * @param \ReservationMateriel $idReservation
     */
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }


}

