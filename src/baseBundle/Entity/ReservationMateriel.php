<?php

namespace baseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservationMateriel
 *
 * @ORM\Table(name="reservation_materiel", indexes={@ORM\Index(name="id_drm", columns={"id_drm"}), @ORM\Index(name="id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class ReservationMateriel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_res", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \DetailReservationMateriel
     *
     * @ORM\ManyToOne(targetEntity="DetailReservationMateriel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_drm", referencedColumnName="id_drm")
     * })
     */
    private $idDrm;

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

