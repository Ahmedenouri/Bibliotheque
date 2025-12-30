<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Repository\UserRepository;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $role = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commande::class, cascade: ['persist'])]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Emprunt::class, cascade: ['persist'])]
    private Collection $emprunts;

    #[ORM\OneToMany(mappedBy: 'bibliothecaire', targetEntity: Emprunt::class)]
    private Collection $empruntsValides;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->emprunts = new ArrayCollection();
        $this->empruntsValides = new ArrayCollection();
    }
}
