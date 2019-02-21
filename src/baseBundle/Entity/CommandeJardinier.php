<?php

namespace App\Entity;

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
    private $validationClient;

    /**
     * @var string
     *
     * @ORM\Column(name="validation_jardinier", type="string", length=5, nullable=false)
     */
    private $validationJardinier;

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
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     * })
     */
    private $idClient;


}

