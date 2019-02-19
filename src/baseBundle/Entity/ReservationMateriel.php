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
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="cin")
     * })
     */
    private $idClient;

    /**
     * @return int
     */
    public function getIdRes()
    {
        return $this->idRes;
    }

    /**
     * @param int $idRes
     */
    public function setIdRes($idRes)
    {
        $this->idRes = $idRes;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param \DateTime $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
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
     * @return \DetailReservationMateriel
     */
    public function getIdDrm()
    {
        return $this->idDrm;
    }

    /**
     * @param \DetailReservationMateriel $idDrm
     */
    public function setIdDrm($idDrm)
    {
        $this->idDrm = $idDrm;
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

