<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FilesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilesRepository::class)]
#[ApiResource]
class Files
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $path;



    #[ORM\OneToOne(mappedBy: 'logo', targetEntity: Categories::class, cascade: ['persist', 'remove'])]
    private $categories;

    #[ORM\OneToOne(mappedBy: 'image', targetEntity: Produits::class, cascade: ['persist', 'remove'])]
    private $produits;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }



    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        // unset the owning side of the relation if necessary
        if ($categories === null && $this->categories !== null) {
            $this->categories->setLogo(null);
        }

        // set the owning side of the relation if necessary
        if ($categories !== null && $categories->getLogo() !== $this) {
            $categories->setLogo($this);
        }

        $this->categories = $categories;

        return $this;
    }

    public function getProduits(): ?Produits
    {
        return $this->produits;
    }

    public function setProduits(?Produits $produits): self
    {
        // unset the owning side of the relation if necessary
        if ($produits === null && $this->produits !== null) {
            $this->produits->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($produits !== null && $produits->getImage() !== $this) {
            $produits->setImage($this);
        }

        $this->produits = $produits;

        return $this;
    }
}
