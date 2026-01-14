<?php

namespace App\Entity;

use App\Repository\SeccioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeccioRepository::class)]
class Seccio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcio = null;

    #[ORM\Column]
    private ?int $any = null;

    #[ORM\Column(length: 100)]
    private ?string $imatge = null;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\OneToMany(targetEntity: Article::class, mappedBy: 'seccio')]
    private Collection $seccioArticles;

    public function __construct()
    {
        $this->seccioArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescripcio(): ?string
    {
        return $this->descripcio;
    }

    public function setDescripcio(string $descripcio): static
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    public function getAny(): ?int
    {
        return $this->any;
    }

    public function setAny(int $any): static
    {
        $this->any = $any;

        return $this;
    }

    public function getImatge(): ?string
    {
        return $this->imatge;
    }

    public function setImatge(string $imatge): static
    {
        $this->imatge = $imatge;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getSeccioArticles(): Collection
    {
        return $this->seccioArticles;
    }

    public function addSeccioArticle(Article $seccioArticle): static
    {
        if (!$this->seccioArticles->contains($seccioArticle)) {
            $this->seccioArticles->add($seccioArticle);
            $seccioArticle->setSeccio($this);
        }

        return $this;
    }

    public function removeSeccioArticle(Article $seccioArticle): static
    {
        if ($this->seccioArticles->removeElement($seccioArticle)) {
            // set the owning side to null (unless already changed)
            if ($seccioArticle->getSeccio() === $this) {
                $seccioArticle->setSeccio(null);
            }
        }

        return $this;
    }
}
