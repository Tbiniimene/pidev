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
     * @var \Livreur
     *
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_livreur", referencedColumnName="id_livreur")
     * })
     */
    private $idLivreur;

    /**
     * @var \Commande
     *

     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande_p")
     * })
     */
    private $idCommande;

    /**
     * @var \ReservationMateriel
     *

     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ReservationMateriel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reservation", referencedColumnName="id_res")
     * })
     */
    private $idReservation;


}

