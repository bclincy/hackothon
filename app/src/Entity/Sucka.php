<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faker\Provider\DateTime;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuckaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Sucka
{
    use TimeStampTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $suckaId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Location", inversedBy="suckas")
     */
    private $location;

    /**
     * @ORM\Column(type="text")
     */
    private $violation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $verified;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="suckas")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublic;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDeleted;

    public function __construct()
    {
        $this->location = new ArrayCollection();
        $this->suckaId = Uuid::uuid4();
        $this->user = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getSuckaId(): \Ramsey\Uuid\UuidInterface
    {
        return $this->suckaId;
    }

    /**
     * @param \Ramsey\Uuid\UuidInterface $suckaId
     */
    public function setSuckaId(\Ramsey\Uuid\UuidInterface $suckaId)
    {
        $this->suckaId = $suckaId;
    }


    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Sucka
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param null|string $company
     * @return Sucka
     */
    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocation(): Collection
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return Sucka
     */
    public function addLocation(Location $location): self
    {
        if (!$this->location->contains($location)) {
            $this->location[] = $location;
        }

        return $this;
    }

    /**
     * @param Location $location
     * @return Sucka
     */
    public function removeLocation(Location $location): self
    {
        if ($this->location->contains($location)) {
            $this->location->removeElement($location);
        }

        return $this;
    }

    /**
     * @return null|string
     */
    public function getViolation(): ?string
    {
        return $this->violation;
    }

    /**
     * @param string $violation
     * @return Sucka
     */
    public function setViolation(string $violation): self
    {
        $this->violation = $violation;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getVerified(): ?DateTime
    {
        return $this->verified;
    }

    /**
     * @param DateTime $verified
     * @return Sucka
     * @internal param DateTime $verified
     */
    public function setVerified(DateTime $verified): self
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    public function getIsPublic(): ?bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): self
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }
}
