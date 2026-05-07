<?php

namespace App\Entity;

use App\Repository\SoutenanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SoutenanceRepository::class)]
class Soutenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numjury = null;

    #[ORM\Column(type: 'date')]
    #[Assert\NotNull(message: 'La date de soutenance est obligatoire.')]
    private ?\DateTimeInterface $datesoutenance = null;

    #[ORM\Column]
    private ?float $note = null;

    #[ORM\ManyToOne(inversedBy: 'soutenances')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Enseignant $enseignant = null;

    /**
     * @var Collection<int, Etudiant>
     */
    #[ORM\OneToMany(targetEntity: Etudiant::class, mappedBy: 'soutenance', orphanRemoval: true)]
    private Collection $etudiants;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumjury(): ?int
    {
        return $this->numjury;
    }

    public function setNumjury(int $numjury): static
    {
        $this->numjury = $numjury;

        return $this;
    }

    public function getDatesoutenance(): ?\DateTimeInterface
    {
        return $this->datesoutenance;
    }

    public function setDatesoutenance(\DateTimeInterface $datesoutenance): static
    {
        $this->datesoutenance = $datesoutenance;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): static
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): static
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants->add($etudiant);
            $etudiant->setSoutenance($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): static
    {
        if ($this->etudiants->removeElement($etudiant)) {
            if ($etudiant->getSoutenance() === $this) {
                $etudiant->setSoutenance(null);
            }
        }

        return $this;
    }
}