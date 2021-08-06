<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $playerLimit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $formula;

    /**
     * @ORM\Column(type="boolean")
     */
    private $registration;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, inversedBy="events")
     */
    private $Users;

    /**
     * @ORM\ManyToMany(targetEntity=Etablissement::class, inversedBy="events")
     */
    private $etablissements;

    /**
     * @ORM\OneToMany(targetEntity=Discipline::class, mappedBy="event")
     */
    private $Discipline;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    /**
     * @ORM\ManyToMany(targetEntity=Tournament::class, mappedBy="evenements")
     */
    private $tournaments;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="event")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=Like::class, mappedBy="event")
     */
    private $likes;

    public function __construct()
    {
        $this->Users = new ArrayCollection();
        $this->etablissements = new ArrayCollection();
        $this->Discipline = new ArrayCollection();
        $this->tournaments = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPlayerLimit(): ?int
    {
        return $this->playerLimit;
    }

    public function setPlayerLimit(int $playerLimit): self
    {
        $this->playerLimit = $playerLimit;

        return $this;
    }

    public function getFormula(): ?string
    {
        return $this->formula;
    }

    public function setFormula(?string $formula): self
    {
        $this->formula = $formula;

        return $this;
    }

    public function getRegistration(): ?bool
    {
        return $this->registration;
    }

    public function setRegistration(bool $registration): self
    {
        $this->registration = $registration;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->Users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->Users->contains($user)) {
            $this->Users[] = $user;
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        $this->Users->removeElement($user);

        return $this;
    }

    /**
     * @return Collection|Etablissement[]
     */
    public function getEtablissements(): Collection
    {
        return $this->etablissements;
    }

    public function addEtablissement(Etablissement $etablissement): self
    {
        if (!$this->etablissements->contains($etablissement)) {
            $this->etablissements[] = $etablissement;
        }

        return $this;
    }

    public function removeEtablissement(Etablissement $etablissement): self
    {
        $this->etablissements->removeElement($etablissement);

        return $this;
    }

    /**
     * @return Collection|Discipline[]
     */
    public function getDiscipline(): Collection
    {
        return $this->Discipline;
    }

    public function addDiscipline(Discipline $discipline): self
    {
        if (!$this->Discipline->contains($discipline)) {
            $this->Discipline[] = $discipline;
            $discipline->setEvent($this);
        }

        return $this;
    }

    public function removeDiscipline(Discipline $discipline): self
    {
        if ($this->Discipline->removeElement($discipline)) {
            // set the owning side to null (unless already changed)
            if ($discipline->getEvent() === $this) {
                $discipline->setEvent(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|Tournament[]
     */
    public function getTournaments(): Collection
    {
        return $this->tournaments;
    }

    public function addTournament(Tournament $tournament): self
    {
        if (!$this->tournaments->contains($tournament)) {
            $this->tournaments[] = $tournament;
            $tournament->addEvenement($this);
        }

        return $this;
    }

    public function removeTournament(Tournament $tournament): self
    {
        if ($this->tournaments->removeElement($tournament)) {
            $tournament->removeEvenement($this);
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setEvent($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getEvent() === $this) {
                $comment->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Like[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Like $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setEvent($this);
        }

        return $this;
    }

    public function removeLike(Like $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getEvent() === $this) {
                $like->setEvent(null);
            }
        }

        return $this;
    }
}
