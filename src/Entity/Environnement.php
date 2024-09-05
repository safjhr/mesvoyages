<?php

namespace App\Entity;

use App\Repository\EnvironnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: EnvironnementRepository::class)]
class Environnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;
    
    #[ORM\ManyToMany(targetEntity: Environnement::class)]
    private Collection $environnements;
     
    public function __construct() {
       $this->environnements = new ArrayCollection();
        
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

    public function getEnvironnement(): ?string
    {
        return $this->Environnement;
    }

    public function setEnvironnement(string $Environnement): static
    {
        $this->Environnement = $Environnement;

        return $this;
    }
    
   

    public function getEnvironnements(): Collection 
    {
        return $this->environnements;
    }
    
    public function addEnvironnement(Environnement $environnement): static
    {
        if (!$this->environnement->constains($environnement)) {
            $this->environnement->add($environnement);
        }

        return $this;
    }
    
    public function removeEnvironnement(Environnement $environnement): static
    {
        $this->environnement->removeElement($environnement);

        return $this;
    }
    
   
}
