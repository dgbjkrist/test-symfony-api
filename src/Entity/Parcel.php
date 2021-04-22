<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ParcelRepository;
use Doctrine\ORM\Mapping as ORM;
use Open\Annotations as OA;
use Symfony\Bridge\Doctrine\IdGenerator\UuidV4Generator;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @Groups({"getcollectionofparcel", "parcel"})
     * @var int|null identifiant unique au format uuid 18292e08-953f-470f-beba-06daa24c0cc3
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"getcollectionofparcel", "parcel"})
     * @var string|null le titre du colis
     */
    private $parcel_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"parcel"})
     * @var string|null le lieu de depart du colis (ville|quartier)
     */
    private $point_depart;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"parcel"})
     * @var string|null la destination du colis (ville|quartier)
     */
    private $point_final;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"parcel"})
     * @var integer|null l'estimation monetaire du contenu du colis
     */
    private $valeur_colis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"parcel"})
     * @var int|null le prix pour l'expedition du colis
     */
    private $price_expedition;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="parcels")
     * @Groups({"getcollectionofparcel", "parcel"})
     * @var integer les reférences du destinataire
     */
    private $destinataire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="parcels")
     * @Groups({"getcollectionofparcel", "parcel"})
     * @var integer les reférences de l'expediteur
     */
    private $expediteur;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"parcel"})
     * @var text|null la description du colis(les différents éléments du colis)
     */
    private $descrip_colis;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"parcel"})
     * @var integer|null le colis est arrivé à destination ou en cours
     */
    private $status_tracking;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     * @Groups({"parcel"})
     * @var \DatetimeInterface|null la date de depart du colis
     */
    private $date_depart;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     * @Groups({"parcel"})
     * @var \DatetimeInterface|null la date d'arrivé du colis
     */
    private $date_arrived;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"parcel"})
     * @var string|null code de retrait à presenté par le destinataire du colis
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
