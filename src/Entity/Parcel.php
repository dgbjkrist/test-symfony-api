<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ParcelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidV4Generator;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass=ParcelRepository::class)
 * @ORM\Table(name="parcels")
 * @ORM\HasLifecycleCallbacks
 */
class Parcel
{
    use Timestampable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\CustomIdGenerator(class=UuidV4Generator::class)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parcel_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $point_depart;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $point_final;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $valeur_colis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $price_expedition;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="parcels")
     */
    private $destinataire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="parcels")
     */
    private $expediteur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descrip_colis;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status_tracking;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $date_depart;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $date_arrived;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_retrait;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getParcelName(): ?string
    {
        return $this->parcel_name;
    }

    public function setParcelName(?string $parcel_name): self
    {
        $this->parcel_name = $parcel_name;

        return $this;
    }

    public function getPointDepart(): ?string
    {
        return $this->point_depart;
    }

    public function setPointDepart(?string $point_depart): self
    {
        $this->point_depart = $point_depart;

        return $this;
    }

    public function getPointFinal(): ?string
    {
        return $this->point_final;
    }

    public function setPointFinal(?string $point_final): self
    {
        $this->point_final = $point_final;

        return $this;
    }

    public function getValeurColis(): ?string
    {
        return $this->valeur_colis;
    }

    public function setValeurColis(?string $valeur_colis): self
    {
        $this->valeur_colis = $valeur_colis;

        return $this;
    }

    public function getPriceExpedition(): ?string
    {
        return $this->price_expedition;
    }

    public function setPriceExpedition(?string $price_expedition): self
    {
        $this->price_expedition = $price_expedition;

        return $this;
    }

    public function getDestinataire(): ?User
    {
        return $this->destinataire;
    }

    public function setDestinataire(?User $destinataire): self
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getExpediteur(): ?User
    {
        return $this->expediteur;
    }

    public function setExpediteur(?User $expediteur): self
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    public function getDescripColis(): ?string
    {
        return $this->descrip_colis;
    }

    public function setDescripColis(?string $descrip_colis): self
    {
        $this->descrip_colis = $descrip_colis;

        return $this;
    }

    public function getStatusTracking(): ?string
    {
        return $this->status_tracking;
    }

    public function setStatusTracking(?string $status_tracking): self
    {
        $this->status_tracking = $status_tracking;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeImmutable
    {
        return $this->date_depart;
    }

    public function setDateDepart(?\DateTimeImmutable $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getDateArrived(): ?\DateTimeImmutable
    {
        return $this->date_arrived;
    }

    public function setDateArrived(?\DateTimeImmutable $date_arrived): self
    {
        $this->date_arrived = $date_arrived;

        return $this;
    }

    public function getCodeRetrait(): ?string
    {
        return $this->code_retrait;
    }

    public function setCodeRetrait(?string $code_retrait): self
    {
        $this->code_retrait = $code_retrait;

        return $this;
    }
}
